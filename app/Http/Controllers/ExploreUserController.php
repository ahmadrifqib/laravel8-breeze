<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // return User::paginate(16);
        return view('users.index', [
            // 'users' => User::limit(10)->get()
            'users' => User::paginate(16)
        ]);
    }
}
