<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'due_date',
        'file',
        'lesson_id',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }



    public function response()
    {
        return $this->hasMany(Response::class);
    }





}
