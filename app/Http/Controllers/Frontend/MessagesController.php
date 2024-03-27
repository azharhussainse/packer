<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Chat;
use App\Models\Auth\User;
use App\Notifications\CreateChat;



class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = Message::where('chat_id',$request->chat_id)->get();
        $user1 = \Auth::user()->id;
        $html = '<ul>';
        foreach ($messages as $m){
            if($m->created_by == $user1){
                $class='sent';
            }else{
                $class='replies';
            }
            $html .='
            <li class="'.$class.'">
                <a href="'.url('profile/'.$m->owner->id).'">
                <img class="avatar" src="'.$m->owner->picture.'" alt="'.$m->first_name.'">
                </a>
                <p>';
            if ($m->type == 'image'){
            $html.= '<img class="w-100" src="'.asset('public/images/'.$m->image).'"><br>';
            }
            $html.=
                $m->message.'
                </p>
            </li>';
        }
        $html.='</ul>';
        echo $html;
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
        $message = new Message();
        if($request->has('image')){
            $message->type = 'image';
            $message->image = $this->upload($request);
        }
        $message->message = $request->message;
        $message->chat_id = $request->chat_id;
        $message->created_by = \Auth::user()->id;
        $message->save();
        $chat = Chat::find($request->chat_id);
        if($chat->user2 == $message->created_by)
        $to = $chat->user1;
        else
        $to = $chat->user2;
        $user = User::find($to);
        //dd($user);
        $when = now()->addMinutes(1);
        $user->notify((new CreateChat($message))->delay($when));
        //add_notification($message->message,'message','chats/'.$chat->id,$to,$message->created_by);
        return back()->with(['flash_success' => 'Message added successfully.']);
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


    public function upload(Request $request){
        if ($request->has('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images'), $imageName);
            return $imageName;
        }
        return false;
    }
}
