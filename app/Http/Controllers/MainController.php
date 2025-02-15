<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {
        return "Home Page";
    }

    function user($name, $age)
    {
        // return "Welcome $name your age is $age";

        // return view('user.profile')
        // ->with('age', $age)
        // ->with('name', $name);

        // return view('user.profile', [
        //     'name' => $name,
        //     'age' => $age
        // ]);

        return view('user.profile', compact('name', 'age'));
    }
}
