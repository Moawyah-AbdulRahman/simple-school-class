<?php

namespace App\Http\Services\Student;

interface StudentService {
    
    public function getPage();

    public function findById(int $id);
}