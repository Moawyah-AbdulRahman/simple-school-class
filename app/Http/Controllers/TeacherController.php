<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeacherResource;
use App\Http\Services\Teacher\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private TeacherService $teacherService;

    public function __construct(TeacherService $teacherService) {
        $this->teacherService = $teacherService;
    }
    
    public function findAll() {
        return TeacherResource::collection($this->teacherService->getPage());
    }

    public function findOne(int $id) {
        return TeacherResource::make($this->teacherService->findById($id));
    }

}
