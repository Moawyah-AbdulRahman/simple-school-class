<?php

namespace App\Providers;

use App\Http\Services\Student\StudentService;
use App\Http\Services\Student\StudentServiceImpl;
use App\Http\Services\Teacher\TeacherService;
use App\Http\Services\Teacher\TeacherServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $singletons = [
        TeacherService::class => TeacherServiceImpl::class,
        StudentService::class => StudentServiceImpl::class
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
