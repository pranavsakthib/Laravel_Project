<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            text-align: center;
        }
        label {
            display: inline-block;
            margin-right: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="radio"] {
            display: inline-block;
            margin-right: 10px;
        }
        .submit,
        .back-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            text-align: center;
            display: inline-block;
        }
        .submit:hover,
        .back-button:hover {
            background-color: #45a049;
        }
        .back-button {
            width: auto;
            display: inline-block;
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Student Details</h1>

        <form>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $student->firstname }}" disabled>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $student->lastname }}" disabled>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" disabled>
            </div>

            <div class="mb-3">
                <label for="standard" class="form-label">Standard</label>
                <input type="text" class="form-control" id="standard" name="standard" value="{{ $student->standard->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" disabled>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" value="{{ $student->gender }}" disabled>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="dob" name="dob" value="{{ $student->dob }}" disabled>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" disabled>{{ $student->address }}</textarea>
            </div>
        </form>

        <!-- Back Button -->
        <a href="{{ route('student.index') }}" class="back-button">Back to Student List</a>
    </div>

</body>
</html>
