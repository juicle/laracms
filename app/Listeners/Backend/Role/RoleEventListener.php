<?php

namespace App\Listeners\Backend\Role;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @var string
     */
    private $log_slug = 'Role';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        log()->log(
            $this->log_slug,
            'created'.$event->role->name,
            $event->role->id,
            'plus',
            'bg-green'
        );
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        log()->log(
            $this->log_slug,
            'updated'.$event->role->name,
            $event->role->id,
            'save',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        log()->log(
            $this->log_slug,
            'deleted'.$event->role->name,
            $event->role->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Role\RoleCreated::class,
            'App\Listeners\Backend\Role\RoleEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Role\RoleUpdated::class,
            'App\Listeners\Backend\Role\RoleEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Role\RoleDeleted::class,
            'App\Listeners\Backend\Role\RoleEventListener@onDeleted'
        );
    }
}
