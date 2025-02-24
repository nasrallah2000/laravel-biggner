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
            if($request->hasfile('image')){
                $imgname = rand().time() . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('images'),$imgname);
            }
            set_time_limit(120); // 120 seconds
            Mail::to('admin@admin.com')->send(new TestEmail());
        // dd($request->all());
    }



}
