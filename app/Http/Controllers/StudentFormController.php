<?php
namespace App\Http\Controllers;

use App\Services\StudentFormService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Standard;
use App\Models\StudentForm; // Add this import statement

use DB;
class StudentFormController extends Controller
{
    protected $studentFormService;

    // Inject StudentFormService via the constructor
    public function __construct(StudentFormService $studentFormService)
    {
        $this->studentFormService = $studentFormService;
    }

    public function store(Request $request)
    {
        // Example usage of the service
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'standard_id' => 'required|exists:standards,id',
            'phone' => 'required|digits:10',
            'gender' => 'required|string|in:Male,Female,Other',
            'dob' => 'required|date|before:today',
            'address' => 'required|string|max:255',
        ]);

        // Call the storeStudent method from the service
        $this->studentFormService->storeStudent($validated);

        return redirect()->route('student.index');
    }

    public function show($id)
    {
        $student = $this->studentFormService->getStudentById($id);
        return view('students.show', compact('student'));
    }

    // public function edit($id)
    // {
    //     $student = $this->studentFormService->getStudentById($id);
    //     return view('students.edit', compact('student'));
    // }

    public function edit($id)
    {
        // Fetch student by ID
        $student = StudentForm::findOrFail($id);

        // Fetch all standards (assuming you have a Standard model)
        $standards = Standard::all();

        // Pass both the student and standards to the view
        return view('students.edit', compact('student', 'standards'));
    }

    public function destroy($id)
    {
        $this->studentFormService->deleteStudent($id);
        return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
    }

    public function update(Request $request, $id)
    {

    // Validate incoming request data
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'standard_id' => 'required|exists:standards,id',  // Validate that the standard exists
            'phone' => 'required|regex:/^\+?[0-9]{10,15}$/',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
            'address' => 'required|string',
        ]);

        // Find the student by ID
        $student = StudentForm::findOrFail($id);

        // Update the student's information
        $student->update($validated);

        // Redirect with a success message
        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
        
    }


    public function create(){

        $standards = Standard::all();

        return view('students.create', compact('standards')); // Replace 'students.create' with the correct view file path
    }

    public function addStandard()
    {
        // You can return a view for the "Add Standard" form here
        // For example, return a view like 'students.addStandard'
        return view('students.addStandard');
    }

    public function showStudentForm()
    {
        // Fetch all standards from the database
        $standards = Standard::all();

        // Return the view and pass the standards data
        return view('students', compact('standards'));
    }


    public function index()
    {

        $students = StudentForm::with('standard')->paginate(10);
        return view('students.index', compact('students'));

        // $students = StudentForm::with('standard')->get(); // Eager load standard relationship
        // return view('students.index', compact('students'));

        // 1. display name with asc order
        // $students = StudentForm::with('standard')
        //                    ->orderBy('firstname')
        //                    ->orderBy('lastname')  
        //                    ->paginate(10);

        // return view('students.index', compact('students'));

        // 3. display only male in asc order
        // $students = StudentForm::where('gender', 'Male')
        //                     ->orderBy('firstname', 'ASC')
        //                     ->orderBy('lastname', 'ASC')
        //                     ->paginate(10);

        // return view('students.index', compact('students'));

        // 4. 7th std student only display
        // $standard = Standard::where('name', '7std')->first(); 
        // if ($standard) {
        //     // Filter students by the 7th Standard ID and order them by name
        //     $students = StudentForm::where('standard_id', $standard->id)
        //         ->orderBy('firstname', 'ASC')
        //         ->orderBy('lastname', 'ASC')
        //         ->paginate(10);
        // } else {
        //     // If 7th standard doesn't exist, return an empty collection or handle accordingly
        //     $students = collect();
        // }
        // return view('students.index', compact('students'));


        // 5. Get all students and paginate results
        // $students = StudentForm::orderBy('firstname', 'asc')
        //                         ->orderBy('lastname', 'asc')
        //                         ->paginate(5); 
        //     return view('students.index', compact('students'));

        // 2. display age = 20
        // $students = StudentForm::with('standard') 
        // ->whereBetween('dob', [
        //     Carbon::now()->subYears(20)->startOfYear(),
        //     Carbon::now()->subYears(20)->endOfYear(),
        // ])
        // ->paginate(10); // Paginate the results
        // return view('students.index', compact('students'));


        // Pass the students data to the view
        // return view('students.index', compact('students'));

        }


}
