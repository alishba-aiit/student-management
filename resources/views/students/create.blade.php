<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<h1>Add Student</h1>

@if ($errors->any())
    <div>
        <strong>Please fix these errors:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('students.store') }}">

    @csrf

    <label>Name</label>
    <input
        type="text"
        name="name"
        value="{{ old('name') }}"
    >

    <br><br>

    <label>Email</label>
    <input
        type="email"
        name="email"
        value="{{ old('email') }}"
    >

    <br><br>

    <button type="submit">
        Save
    </button>

</form>

</body>
</html>