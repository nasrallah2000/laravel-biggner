<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
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

    function post_single($id)
    {
        $post = Post::with('user', 'comments.user')->withCount('comments')->findOrFail($id);
        return view('relations.post_single', compact('post'));
    }

    function related_post($id)
    {
        $related_posts = Tag::with('posts')->findOrFail($id);
        return view('relations.related_post', compact('related_posts'));
    }
}
