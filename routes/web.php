<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentFormController;
use App\Repositories\StudentFormRepository;

use App\Http\Controllers\StandardController;



// Show the student creation form
Route::get('/studentForm', [StudentFormController::class, 'create'])->name('student.form');

// Store a new student
Route::post('/studentForm', [StudentFormController::class, 'store'])->name('student.store');

// List all students
Route::get('/students', [StudentFormController::class, 'index'])->name('student.index');

// View a single student
Route::get('/students/{id}', [StudentFormController::class, 'show'])->name('student.show');

// Show the edit form for a student
Route::get('/students/{id}/edit', [StudentFormController::class, 'edit'])->name('student.edit');

// Update student details
Route::put('/students/{id}', [StudentFormController::class, 'update'])->name('student.update');

// Delete a student
Route::delete('/students/{id}', [StudentFormController::class, 'destroy'])->name('student.destroy');
// addstandard
// Route::get('/student/addStandard', [StudentFormController::class, 'addStandard'])->name('student.addStandard');



Route::get('student/addStandard', [StandardController::class, 'create'])->name('student.addStandard');

// Route to handle form submission (POST request)
Route::post('/standard/store', [StandardController::class, 'store'])->name('standard.store');

// display age 20
Route::get('/students/age-20', [StudentController::class, 'studentsByAge'])->name('students.age20');



// Route::get('/studentForm', function() {
//     return view('studentForm');
// })->name('student.form');
// Route::post('/studentForm', [StudentFormController::class, 'store'])->name('student.store');




// Route::get('/hlo', function () {
//     return view('StudentForm');
// });
