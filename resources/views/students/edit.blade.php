<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS file -->
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
        .radio-group {
            margin-bottom: 20px;
        }
        .radio-group label {
            margin-right: 15px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .btn-primary {
            background-color: #007BFF;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }

        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #fff;
            font-size: 16px;
            appearance: none; /* Remove default browser styling */
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        select:focus {
            outline: none;
            border-color: #4CAF50; /* Change border color on focus */
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        option {
            padding: 10px;
            font-size: 16px;
        }

        /* Styling the dropdown arrow */
        select::-ms-expand {
            display: none;
        }

        .select-container {
            position: relative;
        }

        .select-container::after {
            content: '\25BC'; /* Down arrow */
            font-size: 18px;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #777;
        }

    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Edit Student</h1>

        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Correct the method to PUT -->

            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $student->firstname) }}" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $student->lastname) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="standard_id" class="form-label">Standard</label>
                <select name="standard_id" id="standard_id" class="form-control" required>
                    <option value="">Select Standard</option>
                    @foreach($standards as $standard)
                        <option value="{{ $standard->id }}" {{ old('standard_id', $student->standard_id) == $standard->id ? 'selected' : '' }}>
                            {{ $standard->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" required>
            </div>

            <div class="radio-group">
                <label for="gender" class="form-label">Gender</label><br>
                <label>
                    <input type="radio" name="gender" value="Male" {{ old('gender', $student->gender) == 'Male' ? 'checked' : '' }}>
                    Male
                </label>
                <label>
                    <input type="radio" name="gender" value="Female" {{ old('gender', $student->gender) == 'Female' ? 'checked' : '' }}>
                    Female
                </label>
                <label>
                    <input type="radio" name="gender" value="Other" {{ old('gender', $student->gender) == 'Other' ? 'checked' : '' }}>
                    Other
                </label>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $student->dob) }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $student->address) }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>

        <!-- Back Button -->
        <!-- <a href="{{ route('student.index') }}" class="btn btn-primary mt-3">Update</a> -->
    </div>

</body>
</html>
