<?php

namespace App\Http\Services\Teacher;

interface TeacherService {
    
    public function getPage();

    public function findById(int $id);
}