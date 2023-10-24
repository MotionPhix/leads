<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'slogan',
    'address',
    'website',
    'country',
    'category_id',
  ];

  protected $casts = [
    'created_at' => 'date:d m, Y',
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function tags()
  {
    return $this->morphMany(Tag::class, 'tagable');
  }

  public function contacts()
  {
    return $this->hasMany(Contact::class);
  }

  public function scopeOrderByName(Builder $query)
  {
    return $query->orderBy('name');
  }
}
