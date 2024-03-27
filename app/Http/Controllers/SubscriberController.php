<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Subscriber();
        $post->email = $request->email;
        $post->subscribe = 1;
        $post->save();
        return back()->withFlashSuccess('Subscriber Added successfully.');
    }
}
