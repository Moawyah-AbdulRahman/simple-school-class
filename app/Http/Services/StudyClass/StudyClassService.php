<?php

namespace App\Http\Services\StudyClass;

interface StudyClassService {
    public function getStudyClassesFor($userId, $userType);
}