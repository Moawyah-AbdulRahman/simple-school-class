<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudyClassResource;
use App\Http\Services\StudyClass\StudyClassService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class StudentStudyClassController extends Controller {

    private StudyClassService $studyClassService;

    public function __construct(StudyClassService $studyClassService) {
        $this->studyClassService = $studyClassService;
    }

    public function findMyStudyClasses(Request $request){
        $payload = JWTAuth::payload();
        $studyClasses = $this->studyClassService->getStudyClassesFor($payload['sub'], $payload['user_type']);
        return StudyClassResource::collection($studyClasses);
    }
}
