<?php

namespace App\Services;

use App\Repositories\StudentFormRepository;


class StudentFormService
{
    protected $studentFormRepository;

    public function __construct(StudentFormRepository $studentFormRepository)
    {
        $this->studentFormRepository = $studentFormRepository;
    }

    public function getAllStudents()
    {
        return $this->studentFormRepository->getAll();
    }

    public function storeStudent($data)
    {
      
        return $this->studentFormRepository->create($data);
    }

    public function getStudentById($id)
    {
        return $this->studentFormRepository->findById($id);
    }

    public function updateStudent($id, $data)
    {
        return $this->studentFormRepository->update($id, $data);
    }

    public function deleteStudent($id)
    {
        return $this->studentFormRepository->delete($id);
    }

    

}
