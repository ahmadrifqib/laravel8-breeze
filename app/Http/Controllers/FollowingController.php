<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    //before this __invoke
    public function index(User $user, $following)
    {
        // dd(Auth::user()->hasFollow($user));
        // if ($following == "following") {
        //     $follows = $user->follows;
        // } else if ($following == "follower") {
        //     $follows = $user->followers;
        // } else {
        //     return redirect(route('profile', $user->username));
        // }

        // $follows = $following == "following" ? $user->follows : $user->followers;
        if ($following !== "follower" && $following !== "following") {
            return redirect(route('profile', $user->username));
        }

        return view('users.following', [
            // 'follows' => $follows,
            'follows' => $following == "following" ? $user->follows : $user->followers,
            'user' => $user
        ]);
    }

    // public function following(User $user)
    // {
    //     // dd($user->follows);
    //     return view('users.following', [
    //         'following' => $user->follows,
    //         'users' => $user
    //     ]);
    // }

    // public function follower(User $user)
    // {
    //     return view('users.follower', [
    //         'following' => $user->followers,
    //         'users' => $user
    //     ]);
    // }

    public function store(Request $request, User $user)
    {
        // dd($user);
        // if (Auth::user()->hasFollow($user)) {
        //     Auth::user()->unfollow($user);
        // } else {
        //     Auth::user()->follow($user);
        // }

        Auth::user()->hasFollow($user)
            ? Auth::user()->unfollow($user)
            : Auth::user()->follow($user);

        // Auth::user()->follow($user);

        return back()->with('success', 'Your are follow the user.');
    }
}
