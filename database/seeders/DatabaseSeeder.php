<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentStudyClass;
use App\Models\StudyClass;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'first_name' => 'Ahmad',
            'last_name' => 'Mohsen',
            'phone_number' => '0561234167'
        ]);
        Teacher::create([
            'first_name' => 'Sami',
            'last_name' => 'Hasan',
            'phone_number' => '0561234537'
        ]);

        Student::create([
            'first_name' => 'Mohammed',
            'last_name' => 'Mohsen',
            'phone_number' => '0561234967'
        ]);
        Student::create([
            'first_name' => 'Khaled',
            'last_name' => 'Hasan',
            'phone_number' => '0561234507'
        ]);

        StudyClass::create([
            'subject_name' => 'maths',
            'semester' => 1,
            'year' => 2020,
            'teacher_id' => 1
        ]);
        
        StudyClass::create([
            'subject_name' => 'science',
            'semester' => 1,
            'year' => 2021,
            'teacher_id' => 2
        ]);

        StudentStudyClass::create([
            'student_id' => 1,
            'study_class_id' => 1
        ]);

        StudentStudyClass::create([
            'student_id' => 1,
            'study_class_id' => 2
        ]);

        StudentStudyClass::create([
            'student_id' => 2,
            'study_class_id' => 1
        ]);
    }
}
