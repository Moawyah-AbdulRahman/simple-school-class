<?php

namespace App\Http\Services\StudyClass;

use App\Models\Student;
use App\Models\StudyClass;
use App\Models\Teacher;

class StudyClassServiceImpl implements StudyClassService {
    
    public function getStudyClassesFor($userId, $userType) {
        $entity = null;
        if($userType === 'student') {
            $entity = Student::where('user_id', $userId)->first();
            $studyClassIds = $entity->studentStudyClasses->pluck('study_class_id');
            return StudyClass::whereIn('id', $studyClassIds)->get();

        } else if($userType === 'teacher') {
            return Teacher::where('user_id', $userId)->first()->studyClasses;

        }
    }
}