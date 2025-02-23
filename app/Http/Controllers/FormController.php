<?php

namespace App\Http\Controllers;

use App\Rules\WordCountRule;
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

    function form3(){
        return view('forms.form3');
    }
    function form3_data(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'dob'=>'required|before:-18 years',
            'gender'=>'required',
            'bio'=>['required',new WordCountRule(10)],
            'education_level'=>'required',
            'hobbies'=>'required',
        ],[
            'name.required'=>'الحقل مطلووب'
        ]);
        dd($request->all());
    }

    function form4(){
        return view('forms.form4');
    }
    function form4_data(Request $request){
        $request->validate([
            'name'=>'required',
            'image'=>['required'],
        ]);

    //   $imgname= rand().time(). $request->file('image')->getClientOriginalName();
    // for one image or one file
    $foldername = date('m');
    // $ex = $request->file('image')->getClientOriginalExtension();
    // $imgname = rand().rand().'_'.rand().rand().rand().'_'.rand().rand().'.'.$ex;
    // $request->file('image')->move(public_path('images/').$foldername,$imgname);

    // for multiple images or files
    foreach($request->image as $img){
        $ex = $img->getClientOriginalExtension();
        $imgname = rand().rand().'_'.rand().rand().rand().'_'.rand().rand().'.'.$ex;
        $img->move(public_path('images/').$foldername,$imgname);
    }
    // dd($request->all());

}

    public function someFunction()
{
    // Do something that causes an error
    session()->flash('error', 'This is an error message.');
    return redirect()->back();
}
    //
}
