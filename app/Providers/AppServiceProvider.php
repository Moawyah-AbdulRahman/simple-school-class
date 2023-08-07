<?php

namespace App\Providers;

use App\Http\Services\Auth\AuthService;
use App\Http\Services\Auth\AuthServiceImpl;
use App\Http\Services\Student\StudentService;
use App\Http\Services\Student\StudentServiceImpl;
use App\Http\Services\StudyClass\StudyClassService;
use App\Http\Services\StudyClass\StudyClassServiceImpl;
use App\Http\Services\Teacher\TeacherService;
use App\Http\Services\Teacher\TeacherServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $singletons = [
        TeacherService::class => TeacherServiceImpl::class,
        StudentService::class => StudentServiceImpl::class,
        AuthService::class => AuthServiceImpl::class,
        StudyClassService::class => StudyClassServiceImpl::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
