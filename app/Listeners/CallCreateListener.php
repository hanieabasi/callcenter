<?php

namespace App\Listeners;

use App\Event\CallCreateEvent;
use App\Http\Controllers\CallController;
use App\Jobs\FindResponderJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CallCreateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\CallCreateEvent  $event
     * @return void
     */
    public function handle(CallCreateEvent $event)
    {
        FindResponderJob::dispatchAfterResponse($event->call);
    }
}
