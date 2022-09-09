<?php

namespace App\Jobs;

use App\Models\Call;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\FindResponderJob;

class FindWaitingCallJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $call;

    public function __construct(Call $call)
    {
        $this->call = $call;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $call = Call::whereStatus('waiting')->orderBy('created_at')->first();
        if($call){
            FindResponderJob::dispatchAfterResponse($call);
        }
    }
}
