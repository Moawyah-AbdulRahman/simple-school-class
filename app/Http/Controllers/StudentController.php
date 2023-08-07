<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Http\Services\Student\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private StudentService $studentService;

    public function __construct(StudentService $studentService) {
        $this->studentService = $studentService;
    }
    
    public function findAll() {
        return StudentResource::collection($this->studentService->getPage());
    }

    public function findOne(int $id) {
        return StudentResource::make($this->studentService->findById($id));
    }
}
