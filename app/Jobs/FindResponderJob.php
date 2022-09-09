<?php

namespace App\Jobs;

use App\Models\Call;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FindResponderJob implements ShouldQueue
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
        $user = User::whereHas('roles',function(Bilder $joinRoles){
                return $joinRoles->whereNotNull('priority')->orderBy('priority');
        }
        )->whereDosentHave('responding',function(Bilder $joinCalls){
            return $joinCalls->whereStatus('on_call');
        }
        )->first();
        if($user){
            $this->call->update([
                'status'=>config('constanse.status.on_call'),
                'responder_id'=>$user->id
            ]);
        }
    }
}
