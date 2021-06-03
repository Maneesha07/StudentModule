<?php

namespace App\Http\Controllers;

use App\Models\Marks;
use Illuminate\Http\Request;
use App\Models\Student;
use DataTables;
use App\Http\Requests\MarkRequest;

class MarksController extends Controller
{
    /**
     * Display a listing of the marks
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('marks.index');
    }

    /**
     * To fetch marklist on ajax request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Datatables
     */
    public function getMarks(Request $request)
    {
        if ($request->ajax()) {
            $data = Marks::latest()->with('student')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('total', function($row){
                    return $row->mark_in_maths+$row->mark_in_science+$row->mark_in_history;
                })
                ->addColumn('created_on', function($row){
                    return ($row->created_at)->format('d M Y');
                })
                ->addColumn('action', function($row){
                    return view('marks.partials.action', ['marks' => $row]);
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
        $students = Student::all();
        return view('marks.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MarkRequest  $request
     * @param  \App\Model\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
        $checkExist = Marks::where('student_id', '=', $request->input('student_id'))
                        ->where('terms', '=', $request->input('terms'))->first();
        if ($checkExist) {
            return redirect()->route('marks.index')->withStatus(__('Mark Details already entered.'));
        }
        $marks = Marks::create([
            'student_id' => $request->student_id,
            'terms' => $request->terms,
            'mark_in_maths' => $request->mark_in_maths,
            'mark_in_science' => $request->mark_in_science,
            'mark_in_history' => $request->mark_in_history,
        ]);

        return redirect()->route('marks.index')->withStatus(__('Mark details successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function show(Marks $marks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function edit(Marks $marks)
    {
        $students = Student::all();
        return view('marks.edit', compact('marks','students'));
    }

    /**
     * Update the specified mark entry in storage
     *
     * @param  \App\Http\Requests\MarkRequest  $request
     * @param  \App\Model\Marks  $marks
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MarkRequest $request, Marks $marks)
    {
        $marks->update($request->all());

        return redirect()->route('marks.index')->withStatus(__('Mark Details successfully updated.'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marks $marks)
    {
        $marks->delete();

        return redirect()->route('marks.index')->withStatus(__('Mark details successfully deleted.'));
    }
}
