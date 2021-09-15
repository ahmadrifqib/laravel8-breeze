<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function __invoke()
    {
        $statuses = Status::where('user_id', Auth::user()->id)->get();
        // dd($statuses);
        return view('timeline', compact('statuses'));
    }
}
