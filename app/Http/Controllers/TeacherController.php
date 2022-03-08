<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index()
    {
        return view('Teacher.index');
    }

    public function store(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'name' => 'required',
            'designation' => 'required',
        ]);
        if ($validations->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validations->messages(),
            ]);
        } else {
            Teacher::create([
                'name' => $request->name,
                'designation' => $request->designation,
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Teacher Added Successfully',
            ]);
        }
    }
    public function fetchTeachers()
    {
        $teachers = Teacher::all();
        return response()->json([
            'teachers' => $teachers,
        ]);
    }
    public function editTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        return response()->json([
            'teacher' => $teacher
        ]);
    }
    public function updateTeacher(Request $request, $id)
    {
        $validations = Validator::make($request->all(), [
            'name' => 'required',
            'designation' => 'required',
        ]);
        if ($validations->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validations->messages(),
            ]);
        } else {
            Teacher::where('id', $id)
                ->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Teacher Updated Successfully',
            ]);
        }
    }
    public function destroy($id)
    {
        Teacher::find($id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Teacher Deleted Successfully',
        ]);
    }
}
