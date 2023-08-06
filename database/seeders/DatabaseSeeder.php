<?php

namespace Database\Seeders;

use App\Models\Student;
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
            'last_name' => 'Mohsen'
        ]);
        Teacher::create([
            'first_name' => 'Sami',
            'last_name' => 'Hasan'
        ]);

        Student::create([
            'first_name' => 'Ahmad',
            'last_name' => 'Mohsen'
        ]);
        Student::create([
            'first_name' => 'Sami',
            'last_name' => 'Hasan'
        ]);
    }
}
