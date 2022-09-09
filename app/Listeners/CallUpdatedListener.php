<?php

namespace App\Listeners;

use App\Event\CallUpdatedEvent;
use App\Jobs\FindWaitingCallJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CallUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\CallUpdatedEvent  $event
     * @return void
     */
    public function handle(CallUpdatedEvent $event)
    {
        FindWaitingCallJob::dispatchAfterResponse();
    }
}
