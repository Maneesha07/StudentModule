<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use DataTables;

class StudentsController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('students.index');
    }
    
    /**
     * To fetch students on ajax request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Datatables
     */
    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->with('teacher')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('students.partials.action', ['student' => $row]);

                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StudentRequest  $request
     * @param  \App\Student  $user
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('students.index')->withStatus(__('Student details successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('students.edit', compact('student','teachers'));
    }

    /**
     * Update the specified student in storage
     *
     * @param  \App\Http\Requests\StudentRequest  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('students.index')->withStatus(__('Student Details successfully updated.'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->withStatus(__('Student details successfully deleted.'));
    }
}
