<?php

namespace App\Observers;

use App\Event\CallCreateEvent;
use App\Event\CallUpdatedEvent;
use App\Models\Call;

class CallObserver
{
    /**
     * Handle the Call "created" event.
     *
     * @param \App\Models\Call $call
     * @return void
     */
    public function created(Call $call)
    {
        event(new CallCreateEvent($call));
    }

    /**
     * Handle the Call "updated" event.
     *
     * @param \App\Models\Call $call
     * @return void
     */
    public function updated(Call $call)
    {
       event(new CallUpdatedEvent($call));
    }

    /**
     * Handle the Call "deleted" event.
     *
     * @param \App\Models\Call $call
     * @return void
     */
    public function deleted(Call $call)
    {
        //
    }

    /**
     * Handle the Call "restored" event.
     *
     * @param \App\Models\Call $call
     * @return void
     */
    public function restored(Call $call)
    {
        //
    }

    /**
     * Handle the Call "force deleted" event.
     *
     * @param \App\Models\Call $call
     * @return void
     */
    public function forceDeleted(Call $call)
    {
        //
    }
}
