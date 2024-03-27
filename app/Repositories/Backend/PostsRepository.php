<?php

namespace App\Repositories\Backend;

use App\Events\Backend\Posts\PostCreated;
use App\Events\Backend\Posts\PostDeleted;
use App\Events\Backend\Posts\PostUpdated;
use App\Exceptions\GeneralException;
use App\Models\Post;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class PostsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Post::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'title',
        'receiver_id',
        'slug',
        'details',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->with([
                'owner',
                'updater',
                'receiver',
            ])
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin('users', 'users.id', '=', 'requests.created_by')
            ->select([
                'requests.id',
                'requests.title',
                'users.first_name as created_by',
                'requests.receiver_id',
                'requests.status',
                'requests.created_at',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        if ($this->query()->where('title', $input['title'])->first()) {
            throw new GeneralException(__('exceptions.backend.posts.already_exists'));
        }

        $input['slug'] = Str::slug($input['title']);
        $input['created_by'] = auth()->user()->id;
        $input['status'] = $input['status'] ?? 0;

        if ($post = Post::create($input)) {
            event(new PostCreated($post));

            return $post->fresh();
        }

        throw new GeneralException(__('exceptions.backend.posts.create_error'));
    }

    /**
     * Update Post.
     *
     * @param \App\Models\Post $post
     * @param array $input
     */
    public function update(Post $post, array $input)
    {
        //$input['slug'] = Str::slug($input['title']);
        $input['updated_by'] = auth()->user()->id;
        $input['status'] = $input['status'] ?? 0;
        if($post->slug == null){
            $input['slug'] = Str::slug($input['title']);
        }
        if ($post->update($input)) {


            event(new PostUpdated($post));

            return $post;
        }

        throw new GeneralException(
            __('exceptions.backend.posts.update_error')
        );
    }

    /**
     * @param \App\Models\Post $post
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Post $post)
    {
        if ($post->delete()) {
            event(new PostDeleted($post));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.posts.delete_error'));
    }
}
