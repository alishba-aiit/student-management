<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherCourseController extends Controller
{
    public function store(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $course = Course::findOrFail($validated['course_id']);

        if ($teacher->courses()->where('course_id', $course->id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Teacher is already assigned to this course',
            ], 422);
        }

        $teacher->courses()->attach($course->id);

        return response()->json([
            'success' => true,
            'message' => 'Course assigned to teacher successfully',
            'teacher' => $teacher,
            'course' => $course,
        ], 201);
    }

    public function destroy(Teacher $teacher, Course $course)
    {
        $teacher->courses()->detach($course->id);

        return response()->json([
            'success' => true,
            'message' => 'Course removed from teacher successfully',
        ]);
    }
}