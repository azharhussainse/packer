<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Posts\ManagePostRequest;
use App\Repositories\Backend\PostsRepository;
use Yajra\DataTables\Facades\DataTables;

class PostsTableController extends Controller
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
    }

    /**
     * @param \App\Http\Requests\Backend\Posts\ManagePostRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePostRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->editColumn('offers', function ($post) {
                if($post->offers->count() > 0)
                return 'Y';
                else
                return 'N';
                //return '<a href="'.route('admin.offers.index',$post->id).'">'.$post->offers->count().'</a>';
            })
            ->addColumn('receiver_id', function ($post) {
                if($post->receiver_id > 0){
                    return $post->receiver->name;
                }else{
                    return null;
                }
            })
            ->editColumn('created_at', function ($post) {
                return $post->created_at->toDateString();
            })
            ->addColumn('actions', function ($post) {
                return $post->action_buttons;
            })
            ->escapeColumns(['id'])
            ->make(true);
    }
}
