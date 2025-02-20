<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    function form1()
    {
        return view('forms.form1');
    }

    function form1_data(Request $request)
    {
        // dd($_POST);
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('name'));
        $email = $request->email;
        $name = $request->name;
        return "Name: $name <br> Email: $email";
    }

    function user(){
        return view('forms.user');
    }

    function user_data(Request $request){
        $name = $request->name;
        $age = $request->age;
        return view('forms.user_info',compact("name","age"));
    }

    function form2(){
        return view('forms.form2');
    }

    function form2_data(Request $request){
        $request->validate([
            'first_name'=> 'required|min:3|max:20',
            'last_name'=> 'required|min:3|max:20',
            'email'=> 'required|ends_with:@gmail.com',
            'password'=> 'required|confirmed',
        ]);
        dd($request->all());
        // eturn view('forms.form2_data');
    }
    //
}
