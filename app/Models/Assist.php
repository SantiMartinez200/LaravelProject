<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assist extends Model
{
  function student_assist(): BelongsTo
  {
    return $this->belongsTo(Student::class);
  }
    use HasFactory;
}
