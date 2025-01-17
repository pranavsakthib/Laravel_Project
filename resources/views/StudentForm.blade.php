<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
    
</head>

<body>

    <div class="container">
        <h2>Student Information Form</h2>
        <form action="{{ route('student.store') }}" method="POST" class="student-form">
            @csrf
            
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" placeholder="Enter your First name" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" placeholder="Enter your Last name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="ex: abc@gmail.com" required>

            <label for="standard">Standard:</label>
            <select id="standard" name="standard" required>
                <option value="">Select Standard</option>
                <option value="1">Standard 1</option>
                <option value="2">Standard 2</option>
                <option value="3">Standard 3</option>
                <!-- Add more options as per your requirements -->
            </select><br><br>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="+91" required>

            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="Other">
            <label for="other">Other</label><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="address">Address:</label><br>
            <textarea id="address" name="address" rows="4" cols="50" placeholder="Enter Home Address" required></textarea><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success')}}
        </div>
    @endif
</body>