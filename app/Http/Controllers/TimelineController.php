<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
    public function __invoke()
    {
        // $following = Auth::user()->follows->pluck('id');
        // $statuses = Status::where('user_id', Auth::user()->id)->get();

        // $statuses = Status::whereIn('user_id', $following)->orWhere('user_id', Auth::user()->id)->latest()->get();
        // $statuses = Auth::user()->statuses;
        $statuses = Auth::user()->timeline();
        // dd($statuses);
        return view('timeline', compact('statuses'));
    }
}
