<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Se comunica con el modelo.
        $courses = Course::select( ['id', 'title', 'price'] )
            ->orderBy('id', 'desc')
            ->paginate(20);
        //Renderiza una vista.
        return view('courses.index', [
            'title' => 'Lista de cursos',
            'courses' => $courses
        ]);
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

        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'price' => 'numeric|max:1000000'
        ]);
        
        //Creamos un curso nuevo.
        $course = Course::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se creó correctamente');;

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return $course;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'price' => 'numeric|max:1000000'
        ]);

        $course->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se modificó correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
