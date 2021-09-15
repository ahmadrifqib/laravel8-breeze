<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {
        // $request->validate([
        //     'body' => ['required']
        // ]);

        // Status::create([
        //     'body' => $request->body,
        //     'identifier' => Str::random(32),
        //     'user_id' => Auth::id()
        // ]);

        // Auth::user()->statuses()->create([
        //     'body' => $request->body,
        //     'identifier' => Str::random(32),
        // ]);

        // Auth::user()->makeStatus($request->body);

        // $request->make($request->body);
        $request->make();
        return redirect()->back();
    }
}
