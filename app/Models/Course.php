<?php

namespace App\Models;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];
public function students()
{
    return $this->belongsToMany(
        Student::class,
        'student_course'
    );
}
public function teachers()
{
    return $this->belongsToMany(
        Teacher::class,
        'course_teacher'
    );
}
    }
