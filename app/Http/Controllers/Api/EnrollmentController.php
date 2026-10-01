<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function store(Request $request, Student $student)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $course = Course::findOrFail($validated['course_id']);

        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Student is already enrolled in this course',
            ], 422);
        }

        $student->courses()->attach($course->id);

        return response()->json([
            'success' => true,
            'message' => 'Student enrolled successfully',
            'student' => $student,
            'course' => $course,
        ], 201);
    }

    public function destroy(Student $student, Course $course)
    {
        $student->courses()->detach($course->id);

        return response()->json([
            'success' => true,
            'message' => 'Student removed from course successfully',
        ]);
    }
}