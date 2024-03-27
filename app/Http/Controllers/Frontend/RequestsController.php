<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Offer;
use App\Models\Image;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(isset($_GET['type']) && in_array($_GET['type'],array('myoffers','myrequests','myshippings'))){
            $travels = Post::where('created_by',\Auth::user()->id)->where('type','travel')->orderBy('id','desc')->get();
            $requests = Post::where('created_by',\Auth::user()->id)->where('type','request')->orderBy('id','desc')->get();
            $shippings = Post::where('created_by',\Auth::user()->id)->where('type','shipping')->orderBy('id','desc')->get();
            return view('frontend.requests.myoffers_tabs',compact('travels','requests','shippings'));
        }
        // if(isset($_GET['type']) && $_GET['type'] == 'myrequests'){
        //     $posts = Post::where('created_by',\Auth::user()->id)->where('type','request')->orderBy('id','desc')->get();
        //     return view('frontend.requests.myrequests',compact('posts'));
        // }
        // if(isset($_GET['type']) && $_GET['type'] == 'myshippings'){
        //     $posts = Post::where('created_by',\Auth::user()->id)->where('type','shipping')->orderBy('id','desc')->get();
        //     return view('frontend.requests.myrequests',compact('posts'));
        // }
        $countries = \DB::table('countries')->select('id','name')->get()->pluck('name','id')->toArray();

        $posts = Post::orderBy('id','desc');
        if(isset($_GET['search'])){
            if($_GET['source'] != '')
            $posts->where('source',$_GET['source']);
            if($_GET['source_city'] != '')
            $posts->where('source_city',$_GET['source_city']);
            if($_GET['destination'] != '')
            $posts->where('destination',$_GET['destination']);
            if($_GET['destination_city'] != '')
            $posts->where('destination_city',$_GET['destination_city']);
            if($_GET['type'] != '')
            $posts->where('type',$_GET['type']);
            if($_GET['date'] != ''){
                $posts->where('required_by_date',$_GET['date'])->orderBy('required_by_date','desc');
                $posts->orWhere('go_date',$_GET['date'])->orderBy('go_date','desc');
                $posts->orWhere('return_date',$_GET['date'])->orderBy('return_date','desc');
                
            }
        }

        $posts = $posts->paginate(20);

        return view('frontend.requests.index',compact('posts','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $countries = \DB::table('countries')->select('id','name')->get()->pluck('name','id')->toArray();
        
        if(isset($_GET['type'])){
            $type = $_GET['type'];
            return view('frontend.requests.create_'.$type,['countries'=>$countries]);    
        }
        return view('frontend.requests.create_request',['countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'title'              => 'required',
            'source'            => 'required',
            //'source_city'       => 'required',
            'destination'       => 'required',
            //'destination_city'  => 'required',
        ]);
        $post = new Post();
        $inputs = $request->all();
        unset($inputs['_token']);
        unset($inputs['product_link']);
        unset($inputs['product_picture']);
        $id = $post->insertGetId($inputs);
        $post = Post::find($id);
        if ($request->file('product_picture')) {
            $files = $request->file('product_picture');
            foreach($files as $file){
                $imageName = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $imageName, 'public');
                $image = new Image();
                $image::create(['path'=>$path,'request_id'=>$post->id]);
            }
        }
        $post->product_link = json_encode($request->product_link);
        $post->created_by = \Auth::user()->id;
        $post->created_at = date("Y-m-d H:i:s");
        $post->slug = \Str::slug($request->title).'-'.time();
        $post->save();
        return back()->withFlashSuccess('Request Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('frontend.requests.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $type = $post->type;
        $countries = \DB::table('countries')->select('id','name')->get()->pluck('name','id')->toArray();

        $scities = \DB::table('cities')->select('id','name')->where('country_id',$post->source)->get()->pluck('name','id')->toArray();

        $dcities = \DB::table('cities')->select('id','name')->where('country_id',$post->destination)->get()->pluck('name','id')->toArray();
        
        
        return view('frontend.requests.edit_'.$type,['post'=>$post, 'countries'=>$countries,'scities'=>$scities,'dcities'=>$dcities]);
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
        $post = Post::find($id);
        $type = $post->type;
        $inputs = $request->all();
        unset($inputs['_token']);
        unset($inputs['_method']);
        foreach($inputs as $k=>$v){
            $post->{$k} = $v;
        }
        $post->type = $type;
        $post->update();
        return back()->withFlashSuccess('Request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function orders(){
        $user = \Auth::user();
        $orders = offer::where('request_to',$user->id)->orWhere('offer_by',$user->id)->orderby('id','desc')->get();
        return view('frontend.requests.myorders',compact('orders'));
        
    }
}
