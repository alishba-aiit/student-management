<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

<h1>Students</h1>
<form method="POST" action="/logout">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>

<a href="{{ route('students.create') }}">
    Add Student
</a>

<hr>

@foreach ($students as $student)

    <h3>{{ $student->name }}</h3>

    <p>{{ $student->email }}</p>

    <a href="{{ route('students.show', $student->id) }}">
        View
    </a>

    <hr>

@endforeach
{{ $students->links() }}

</body>
</html>