<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curriculum extends Model
{
  protected $table = 'curriculums';

  public function lectures(): BelongsToMany
  {
    return $this->belongsToMany(Lecture::class, 'curriculum_lectures', 'curriculum_id', 'lecture_id');
  }

  public function groups(): HasMany
  {
    return $this->HasMany(Group::class);
  }
}
