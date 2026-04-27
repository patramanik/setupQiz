<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'exam_id',
        'name',
        'subject_code',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subject) {
            $latestSubject = static::latest('id')->first();
            $nextId = $latestSubject ? $latestSubject->id + 1 : 1;
            $subject->subject_code = 'SUB-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        });
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
