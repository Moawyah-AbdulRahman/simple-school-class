<?php

use App\Models\Teacher;
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
        Schema::create('study_classes', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name', 255);
            $table->unsignedTinyInteger('semester');
            $table->unsignedSmallInteger('year');
            $table->foreignIdFor(Teacher::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_classes');
    }
};
