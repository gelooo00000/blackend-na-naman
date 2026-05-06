<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'student') {
            abort(403, 'Students cannot access student records.');
        }

        $status = request('status', 'all');

        $studentsQuery = Student::query();
        if ($status === '1') {
            $studentsQuery->where('status', true);
        } elseif ($status === '0') {
            $studentsQuery->where('status', false);
        }

        $students = $studentsQuery->latest('id')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Admin access only!');
        }
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Admin access only!');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'age' => 'required|integer|min:1',
            'address' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:100',
            'status' => 'boolean',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
                        ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Admin access only!');
        }
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        if (!in_array(auth()->user()->role, ['admin', 'teacher'])) {
            abort(403, 'Admin or Teacher access only!');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age' => 'required|integer|min:1',
            'address' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:100',
            'status' => 'boolean',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
                        ->with('success','Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Admin access only!');
        }
        $student->delete();

        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully.');
    }
}
