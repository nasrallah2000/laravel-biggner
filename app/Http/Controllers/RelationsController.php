<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelationsController extends Controller
{
    function users() {
        return view('relations.users');
    }
}
