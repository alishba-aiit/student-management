<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10);

        return StudentResource::collection($students);
    }

    public function show(Student $student)
    {
        Gate::authorize('view', $student);

        return new StudentResource($student);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:students,email',
        ]);

        $student = Student::create($validated);

        return new StudentResource($student);
    }

    public function update(Request $request, Student $student)
    {
        Gate::authorize('update', $student);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully',
            'data' => $student,
        ]);
    }

    public function destroy(Student $student)
    {
        Gate::authorize('delete', $student);

        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully',
        ]);
    }
}