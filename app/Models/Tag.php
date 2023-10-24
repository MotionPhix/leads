<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Tag extends Model
{
  use HasFactory;

  protected $fillable = [
    'type',
    'notes'
  ];

  public function tagable(): MorphTo
  {
    return $this->morphTo();
  }
}
