<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => ['string', 'min:3', 'max:191', 'required'],
            'email' => ['email', 'string', 'min:3', 'max:191', 'required'],
            'username' => ['alpha_num', 'required', 'unique:users,username,' . auth()->id()]
        ]);


        auth()->user()->update(
            $attr
            // [
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'username' => $request->username
            // ]
        );


        return redirect()
            ->route('profile', auth()->user()->username)
            ->with('message', 'Your profile has been updated.');
        // return back()->with('messgae', 'Your profile has been updated.');
    }
}
