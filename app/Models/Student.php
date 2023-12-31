<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number'
    ];

    public function studentStudyClasses() {
        return $this->hasMany(StudentStudyClass::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
