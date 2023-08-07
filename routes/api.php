<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use App\Models\StudyClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\StringManipulation\Pass\ClassNamePass;



Route::get('/health', function() {
    return 'Ok';
});

Route::get('test/{id}', function($id) {

    return Student::join('student_study_classes', 'students.id', '=', 'student_study_classes.student_id')
        ->where('student_study_classes.study_class_id', $id)
        ->get();
});

Route::get('/teacher', [TeacherController::class, 'findAll']);
Route::get('/teacher/{id}', [TeacherController::class, 'findOne']);

Route::get('/student', [StudentController::class, 'findAll']);
Route::get('/student/{id}', [StudentController::class, 'findOne']);



Route::get('/list-routes', function () {
    $routes = collect(Route::getRoutes())->map(function ($route) {
        return [
            'route' => $route->uri(),
            'supportedMethods' => $route->methods()
        ];
    });

    return response()->json($routes);
});
