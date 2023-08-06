<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\StringManipulation\Pass\ClassNamePass;



Route::get('/health', function() {
    return 'Ok';
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
