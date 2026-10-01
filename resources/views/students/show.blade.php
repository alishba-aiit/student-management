<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
<h1>Student Details</h1>

<p>ID: {{ $student->id }}</p>

<p>Name: {{ $student->name }}</p>

<p>Email: {{ $student->email }}</p>

<a href="{{ route('students.index') }}">
    Back
</a>

</body>
</html>