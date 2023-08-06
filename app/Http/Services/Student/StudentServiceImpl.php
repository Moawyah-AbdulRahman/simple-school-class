<?php

namespace App\Http\Services\Student;

use App\Exceptions\BusinessException;
use App\Http\Services\Student\StudentService;
use App\Models\Student;

class StudentServiceImpl implements StudentService {

    public function getPage() {
        return Student::paginate();
    }

    public function findById(int $id) {
        $student = Student::find($id);
        if (is_null($student)) {
            throw new BusinessException('A Student with id: '.$id.' does not exist.', 404);
        }
        return $student;
    }
    
}