<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyClass extends Model
{
    use HasFactory;

    public function teacher() {
        return $this->belongsTo(Teacher::class)->withDefault();
    }
    
    public function studentStudyClasses() {
        return $this->hasMany(StudentStudyClass::class);
    }
}
