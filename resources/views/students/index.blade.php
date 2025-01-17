@php
    $serialNo = 1; // Initialize the serial number variable
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Custom CSS to reduce the size of the pagination buttons */
        .pagination-sm .page-link {
            padding: 0.25rem 0.5rem; /* Adjust padding */
            font-size: 0.75rem; /* Smaller font size */
            height: 30px; /* Adjust height if needed */
            line-height: 1.2; /* Adjust line height for better centering */
        }

        .pagination-sm .page-item {
            margin: 0 0.1rem; /* Optional: Adjust space between buttons */
        }
    </style>

</head>
<body>

    <div class="container-fluid mt-5 px-0">
        <h1 class="mb-4 text-center">Student List</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('student.form') }}" class="btn btn-primary mr-2">Add New Student</a>
            <a href="{{ route('student.addStandard') }}" class="btn btn-primary">Add Standard</a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add table-responsive class for responsiveness -->
        <div class="table-responsive">
            <table class="table table-striped w-80">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <!-- <th>First Name</th>
                        <th>Last Name</th> -->
                        <th>Email</th>
                        <th>Standard</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $serialNo++ }}</td>
                            <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                            <!-- <td>{{ $student->firstname }}</td>
                            <td>{{ $student->lastname }}</td> -->
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->standard ? $student->standard->name : 'No standard assigned' }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->dob }}</td>
                            <td>{{ $student->address }}</td>
                            <td>
                                <a href="{{ route('student.show', $student->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Display pagination links -->
            <!-- <div class="d-flex justify-content-center">
                <ul class="pagination pagination-sm">
                    {{ $students->links() }}
                </ul>
            </div> -->

            {{ $students->links() }}
        </div>
    </div>

    <style>
        .w-5.h-5{
            width: 15px;
        }
    </style>

</body>
</html>
