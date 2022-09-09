<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallRequest;
use App\Http\Resources\CallResource;
use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function store(CallRequest $request)
    {
        return new CallResource(Call::create($request->validated()));
    }
    public function update(Request $request,call $call)
    {
        $call->update([
            'status'=>config('constance.status.finished'),
            'responder_id'=>$request->responder_id
        ]);
        return new CallResource($call->refresh());
    }
}
