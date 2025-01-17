<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standard;

class StandardController extends Controller
{
    //
    public function create()
    {
        return view('students.addstandard');  
    }

    // app/Http/Controllers/StandardController.php
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'standardName' => 'required|string|max:255',
        ]);

        // Create a new Standard
        $standard = new Standard();
        $standard->name = $validated['standardName']; // Use 'name' instead of 'standard_name'
        $standard->save();

        return redirect()->route('student.index')->with('success', 'Standard added successfully');
    }


}
