<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:students,email',
    ]);

    Student::create($validated);

    return redirect()->route('students.index');
}

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('students.show', compact('student'));
    }
}