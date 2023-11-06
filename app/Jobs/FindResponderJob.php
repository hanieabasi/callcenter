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
use Illuminate\Database\Eloquent\Builder;

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
        $user = User::whereHas('roles',function(Builder $joinRoles){
                return $joinRoles->whereNotNull('priority')->orderBy('priority');
        }
        )->whereDoesntHave('responder_id',function(Builder $joinCalls){
            return $joinCalls->where('status','on_call');
        }
        )->first();
        if($user){
            $this->call->update([
                'status'=>config('constance.status.on_call'),
                'responder_id'=>$user->id
            ]);
        }
    }
}
