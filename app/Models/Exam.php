<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name',
        'exam_code',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($exam) {
            $latestExam = static::latest('id')->first();
            $nextId = $latestExam ? $latestExam->id + 1 : 1;
            $exam->exam_code = 'EXAM-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        });
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
