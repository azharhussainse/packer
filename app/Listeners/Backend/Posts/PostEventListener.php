<?php

namespace App\Listeners\Backend\Posts;

/**
 * Class PostEventListener.
 */
class PostEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Post';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.created") <strong>'.$event->post->title.'</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.updated") <strong>'.$event->post->title.'</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.deleted") <strong>'.$event->post->title.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Posts\PostCreated::class,
            'App\Listeners\Backend\Posts\PostEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Posts\PostUpdated::class,
            'App\Listeners\Backend\Posts\PostEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Posts\PostDeleted::class,
            'App\Listeners\Backend\Posts\PostEventListener@onDeleted'
        );
    }
}
