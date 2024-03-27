<?php

namespace App\Http\Responses\Backend\Post;

use Illuminate\Contracts\Support\Responsable;
use App\Models\Auth\User;

class EditResponse implements Responsable
{
    /**
     * @var \App\Models\Post\Post
     */
    protected $post;

    /**
     * @param \App\Models\Post\Post $post
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $users = User::all()->pluck('name','id');
        return view('backend.posts.edit')
            ->withPost($this->post)->with('users',$users);
    }
}
