<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $courses = Course::all();
        $column  = 'id';
        $type = 'asc';

        if ($request->has('column')) {
            $column = $request->column;
            if (!in_array($column, ['id', 'name', 'price', 'created_at'])) {
                $column  = 'id';
            }
            $type = $request->type;
        }
        if ($request->has('q') && !empty($request->q)) {
            $courses = Course::orderBy($column, $type)->where('name', 'like', '%' . $request->q . '%')->paginate(10);
        } else {
            $courses = Course::orderBy($column, $type)->paginate(10);
        }
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // validate
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'content' => 'required',
            'price' => 'required|numeric',
            'hours' => 'required|numeric',
        ]);

        // upload files
        $img_name = time() . rand() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $img_name);
        // store in database
        // 1- Using Model Object
        // $course = new Course();
        // $course->name = $request->name;
        // $course->image = $img_name;
        // $course->content = $request->content;
        // $course->price = $request->price;
        // $course->hours = $request->hours;
        // $course->save();

        // 2- Using Model Method
        $data = $request->except('_token', 'image');
        $data['image'] = $img_name;
        Course::create($data);
        // Course::create([
        //     'name' => $request->name,
        //     'image' => $img_name,
        //     'content' => $request->content,
        //     'price' => $request->price,
        //     'hours' => $request->hours
        // ]);


        // redirect to another route
        return redirect()
            ->route('courses.index')
            ->with('msg', 'Course Created Successfully')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $course)
    {
        // return view('courses.show_course',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $course = Course::find($id);
        // if(!$course){
        //     abort('404');
        // }
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'content' => 'required',
            'price' => 'required|numeric',
            'hours' => 'required|numeric',
        ]);

        // upload files
        $course = Course::findOrFail($id);
        $data = $request->except('_token', 'image');

        if ($request->hasFile('image')) {
            File::delete(public_path('images/' . $course->image));
            $img_name = time() . rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $img_name);
            $data['image'] = $img_name;
        }

        $course->update($data);



        // redirect to another route
        return redirect()
            ->route('courses.index')
            ->with('msg', 'Course Updated Successfully')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);
        return redirect()
            ->route('courses.index')
            ->with('msg', 'Course deleted Successfully')
            ->with('type', 'error');
    }

    function trash()
    {
        $courses = Course::onlyTrashed()->latest('deleted_at')->paginate(10);
        return view('courses.trash', compact('courses'));
    }

    function restore($id)
    {
        Course::onlyTrashed()->find($id)->restore();
        return redirect()->route('courses.index');
    }

    function forcedelete($id)
    {
       $course = Course::onlyTrashed()->find($id);
        File::delete(public_path('images/' . $course->image));
        $course->forcedelete();
        return redirect()->back();
        // return redirect()->route('courses.index');
    }
}
