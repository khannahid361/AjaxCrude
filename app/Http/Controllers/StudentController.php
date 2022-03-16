<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('Student.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Student::create($request->all());
        return redirect()->back();
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('Student.update', compact('student'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        Student::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }
}
