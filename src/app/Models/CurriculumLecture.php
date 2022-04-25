<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumLecture extends Model

{
    use HasFactory;
    protected $fillable = [
        'curriculum_id',
        'lecture_id',
        'queue'
    ];
}
