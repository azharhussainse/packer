<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Auth\User;
use App\Models\Message;
use App\Notifications\CreateChat;


class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id1 = \Auth::user()->id;
        $user1 = User::find($user_id1);
        $chats = Chat::where('created_by',$user1->id)->orWhere('user2',$user1->id)->get();
        return view('frontend.chats.index',compact('user1','chats'));
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
        $user1 = User::find($request->user1);
        $user2 = User::find($request->user2);
        $chat = Chat::where('user1',$user1->id)->where('user2',$user2->id)->orWhere('user1',$user2->id)->where('user2',$user1->id)->first();
        //dd($chat,$request->input());
        if($chat == null){
            $chat = new Chat();
            $chat->user1 = $user1->id;
            $chat->user2 = $user2->id;
            $chat->created_by = $user1->id;
            $chat->save();
        }
        //$user2->notify(new CreateChat($chat));
        if($request->has('isAjax')){
            return redirect(route('frontend.chats.show',$chat->id));
        }else{
            return response()->json([
                'id' => $chat->id
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id1 = \Auth::user()->id;
        $user = User::find($user_id1);
        $chat = Chat::find($id);
        $user1 = User::find($chat->user1);
        $user2 = User::find($chat->user2);
        // if($chat == null){
        //     $chat = new Chat();
        //     $chat->user1 = $user1->id;
        //     $chat->user2 = $user2->id;
        //     $chat->created_by = $user1->id;
        //     $chat->save();
        // }
        $chats = Chat::where('user1',$user->id)->orWhere('user2',$user->id)->get();
        $messages = Message::where('chat_id',$chat->id)->get();
        return view('frontend.chats.show',compact('user1','user2','chat','chats','messages','user'));
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
        //
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
}
