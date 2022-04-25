<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
  protected $table = 'student_groups';
    protected $fillable = [
        'name',
        'curriculum_id'
    ];
  public function curriculum(): BelongsTo
  {
    return $this->belongsTo(Curriculum::class);
  }

  public function students(): HasMany
  {
    return $this->HasMany(Student::class);
  }
}
