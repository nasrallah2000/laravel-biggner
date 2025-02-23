<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function email() {
        return view('email');
    }
    function email_data(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'phone'=>'required',
            'message'=>'required',
            'image' => 'nullable|image|mimes:jpg,png',
            ]);
            set_time_limit(120); // 120 seconds
            Mail::to('admin@admin.com')->send(new TestEmail());
        // dd($request->all());
    }



}
