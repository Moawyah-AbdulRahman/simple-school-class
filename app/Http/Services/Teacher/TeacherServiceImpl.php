<?php

namespace App\Http\Services\Teacher;

use App\Exceptions\BusinessException;
use App\Models\Teacher;

class TeacherServiceImpl implements TeacherService {

    public function getPage() {
        return Teacher::paginate();
    }

    public function findById(int $id) {
        $teacher = Teacher::find($id);
        if (is_null($teacher)) {
            throw new BusinessException('A Teacher with id: '.$id.' does not exist.', 404);
        }
        return $teacher;
    }
    
}