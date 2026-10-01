<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\StudentResource;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function index()
{
    $students = Student::paginate(10);

    return StudentResource::collection($students);
}

   public function show($id)
{
    $student = Student::findOrFail($id);

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
    public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
    ]);

    $student->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Student updated successfully',
        'data' => $student
    ]);
}
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully'
        ]);
    }
}