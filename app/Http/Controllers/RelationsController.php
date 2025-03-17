<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    function users()
    {
        $users = User::with('profile')->get();
        return view('relations.users', compact('users'));
    }
    function profile($id)
    {
        $profile = Profile::with('user')->find($id);
        dd($profile->user->name);
    }

    function posts()
    {
        $posts = Post::with('user', 'comments')->withCount('comments')->latest('id')->paginate(12);
        return view('relations.posts', compact('posts'));
    }
}
