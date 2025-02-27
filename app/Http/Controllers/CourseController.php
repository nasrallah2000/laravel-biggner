<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $courses = Course::all();
        $courses = Course::paginate(10);
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_course()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_course(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $course)
    {
        return view('courses.show_course',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
