<?php

namespace App\Listeners\Backend\User;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @var string
     */
    private $log_slug = 'User';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        log()->log(
            $this->log_slug,
            'created'.$event->user->name,
            $event->user->id,
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
            'updated'.$event->user->name,
            $event->user->id,
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
            'deleted'.$event->user->name,
            $event->user->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        log()->log(
            $this->log_slug,
            'restored'.$event->user->name,
            $event->user->id,
            'refresh',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        log()->log(
            $this->log_slug,
            'permanently_deleted'.$event->user->name,
            $event->user->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        log()->log(
            $this->log_slug,
            'changed_password'.$event->user->name,
            $event->user->id,
            'lock',
            'bg-blue'
        );
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        log()->log(
            $this->log_slug,
            'deactivated'.$event->user->name,
            $event->user->id,
            'times',
            'bg-yellow'
        );
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        log()->log(
            $this->log_slug,
            'reactivated'.$event->user->name,
            $event->user->id,
            'check',
            'bg-green'
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
            \App\Events\Backend\User\UserCreated::class,
            'App\Listeners\Backend\User\UserEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\User\UserUpdated::class,
            'App\Listeners\Backend\User\UserEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\User\UserDeleted::class,
            'App\Listeners\Backend\User\UserEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\User\UserRestored::class,
            'App\Listeners\Backend\User\UserEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\User\UserPermanentlyDeleted::class,
            'App\Listeners\Backend\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\User\UserPasswordChanged::class,
            'App\Listeners\Backend\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Backend\User\UserDeactivated::class,
            'App\Listeners\Backend\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            \App\Events\Backend\User\UserReactivated::class,
            'App\Listeners\Backend\User\UserEventListener@onReactivated'
        );
    }
}
