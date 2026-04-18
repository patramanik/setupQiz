<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Student extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected static function booted()
    {
        static::creating(function ($student) {
            $year = date('Y');

            // Loop until a unique ID is generated
            do {
                // Generates: 2026- plus 6 random uppercase alphanumeric characters
                $randomCode = strtoupper(Str::random(6));
                $newId = $year . '-' . $randomCode;
            } while (self::where('student_id', $newId)->exists());

            $student->student_id = $newId;
        });
    }
}
