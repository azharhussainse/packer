<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Notifications\CreateOffer;
use App\Models\Auth\User;


class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $offer->request_id = $request->request_id;
        $offer->offer_by = $request->offer_by;
        $offer->request_to = $request->request_to;
        $offer->details = $request->details;
        $offer->price = $request->price;
        $offer->fee = 100;
        $offer->status = 'pending';
        $offer->shipdate = $request->shipdate;
        if ($request->product_link) {
          $offer->product_link = json_encode($request->product_link);
        }
        $offer->save();
        if ($request->file('product_picture')) {
            $files = $request->file('product_picture');
            foreach($files as $file){
                $imageName = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $imageName, 'public');
                $image = new Image();
                $image::create(['path'=>$path,'offer_id'=>$offer->id]);
            }
        }
        $user = User::find($request->request_to);
        $user->notify(new CreateOffer($offer));
        return back()->withFlashSuccess('Offer Added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $inputs = $request->all();
        unset($inputs['_token']);
        unset($inputs['_method']);
        foreach($inputs as $k=>$v){
            $offer->{$k} = $v;
        }
        //$offer->status = $request->status;
        $offer->update();
        $user = User::find($offer->request_to);
        $user->notify(new CreateOffer($offer));
        return back()->withFlashSuccess('Offer Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return back()->withFlashSuccess('Offer Deleted successfully.');
        
    }
}
