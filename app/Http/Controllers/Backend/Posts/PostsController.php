<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Posts\CreatePostRequest;
use App\Http\Requests\Backend\Posts\DeletePostRequest;
use App\Http\Requests\Backend\Posts\EditPostRequest;
use App\Http\Requests\Backend\Posts\ManagePostRequest;
use App\Http\Requests\Backend\Posts\StorePostRequest;
use App\Http\Requests\Backend\Posts\UpdatePostRequest;
use App\Http\Responses\Backend\Post\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Post;
use App\Models\Auth\User;
use App\Repositories\Backend\PostsRepository;
use Illuminate\Support\Facades\View;

class PostsController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PostsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PostsRepository $repository
     */
    public function __construct(PostsRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['posts']);
    }

    /**
     * @param \App\Http\Requests\Backend\Posts\ManagePostRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePostRequest $request)
    {
        return new ViewResponse('backend.posts.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Posts\CreatePostRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(CreatePostRequest $request)
    {
        $users = User::all()->pluck('name','id');
        return view('backend.posts.create')->with('users',$users);
        // return new ViewResponse('backend.posts.create');
    }

    /**
     * @param \App\Http\Requests\Backend\Posts\StorePostRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        $this->repository->create($request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.posts.index'), ['flash_success' => __('alerts.backend.posts.created')]);
    }

    /**
     * @param \App\Models\Post $post
     * @param \App\Http\Requests\Backend\Posts\EditPostRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function edit(Post $post, EditPostRequest $request)
    {
        return new EditResponse($post);
    }

    /**
     * @param \App\Models\Post $post
     * @param \App\Http\Requests\Backend\Posts\UpdatePostRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        $this->repository->update($post, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.posts.index'), ['flash_success' => __('alerts.backend.posts.updated')]);
    }

    /**
     * @param \App\Models\Post $post
     * @param \App\Http\Requests\Backend\Posts\DeletePostRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Post $post, DeletePostRequest $request)
    {
        $this->repository->delete($post);

        return new RedirectResponse(route('admin.posts.index'), ['flash_success' => __('alerts.backend.posts.deleted')]);
    }
}
