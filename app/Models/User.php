<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function contacts(): HasMany
  {
    return $this->hasMany(\App\Models\Contact::class);
  }

  protected function fullName(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => $this->first_name . ' ' . $this->last_name
    );
  }

  public function avatarUrl()
  {
    return $this->images
      ? Storage::disk('users')->url($this->images->random()->path)
      : '';
  }

  /*protected static function boot()
  {
    parent::boot();

    static::created(function ($user) {
      // Check if the user is the first in the database
      $isFirstUser = static::count() === 1;

      if ($isFirstUser) {
        // Set the user's type to "administrator"
        $user->role = 'admin';
        $user->save();
      }
    });
  }*/
}
