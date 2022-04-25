<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lecture extends Model
{
  protected $table = 'lectures';
  protected $fillable = [
    'topic',
    'description'
  ];
  public function curriculums(): BelongsToMany
  {
    return $this->belongsToMany(Curriculum::class, 'curriculum_lectures', 'lecture_id', 'curriculum_id');
  }
}
