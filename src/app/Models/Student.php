<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
  protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'group_id'
    ];

  public function group(): BelongsTo
  {
    return $this->BelongsTo(Group::class);
  }
}
