<?php

use App\Models\Student;
use App\Models\StudyClass;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_study_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('first_mark')->nullable();
            $table->unsignedTinyInteger('mid_term_mark')->nullable();
            $table->unsignedTinyInteger('final_term_mark')->nullable();
            $table->foreignIdFor(StudyClass::class);
            $table->foreignIdFor(Student::class);
            $table->timestamps();

            $table->unique(['study_class_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_study_classes');
    }
};
