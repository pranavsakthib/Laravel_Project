<?php

namespace App\Repositories;

use App\Models\StudentForm;

class StudentFormRepository
{
    public function create(array $data)
    {
        return StudentForm::create($data);
    }

    public function getAll()
    {
        return StudentForm::all();
    }

    public function findById($id)
    {
        return StudentForm::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $student = StudentForm::findOrFail($id);
        $student->update($data);
        return $student;
    }

    public function delete($id)
    {
        $student = StudentForm::findOrFail($id);
        return $student->delete();
    }

    
}


