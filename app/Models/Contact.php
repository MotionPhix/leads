<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Contact extends Model
{
  use HasFactory;

  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'bio',
    'job_title',
    'company_id',
    'user_id',
    'status'
  ];

  protected $casts = [
    'created_at' => 'date:d m, Y',
    'last_interaction' => 'datetime',
  ];

  public function company(): BelongsTo
  {
    return $this->belongsTo(Company::class);
  }

  public function interactions(): HasMany
  {
    return $this->hasMany(Interaction::class);
  }

  public function interaction(): HasOne
  {
    return $this->hasOne(Interaction::class, 'id', 'last_interaction_id');
  }

  public function scopeWithLastInteractionDate($query)
  {
    $subQuery = \DB::table('interactions')
      ->select('created_at')
      ->whereRaw('contact_id = contacts.id')
      ->latest()
      ->limit(1);

    return $query->select('contacts.*')->selectSub($subQuery, 'last_interaction_date');
  }

  public function scopeWithLastInteractionType($query)
  {
    $subQuery = \DB::table('interactions')
      ->select('type')
      ->whereRaw('contact_id = contacts.id')
      ->latest()
      ->limit(1);

    return $query->select('contacts.*')->selectSub($subQuery, 'last_interaction_type');
  }

  public function scopeWithLastInteraction($query)
  {
    $subQuery = \DB::table('interactions')
      ->select('id')
      ->whereRaw('contact_id', 'contacts.id')
      ->latest()
      ->limit(1);

    return $query->select('contacts.*')->selectSub($subQuery, 'last_interaction_id')->with('lastInteraction');
  }

  protected function fullName(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => $this->first_name . ' ' . $this->last_name
    );
  }

  public function archived(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => $this->status === 'dormant'
    );
  }

  public function statusColor(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => ['active' => 'bg-green-100 text-green-800', 'dormant' => 'bg-rose-100 text-rose-800'][$this->status] ?? 'bg-blue-100 text-blue-800'
    );
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function phones(): MorphMany
  {
    return $this->morphMany(Phone::class, 'phoneable');
  }

  public function total()
  {
    return $this->forUser(auth()->user())->count();
  }

  public function scopeOrderByName($query)
  {
    $query->orderBy('first_name')->orderBy('last_name');
  }

  public function scopeOrderByCompany($query)
  {
    $query->join('companies', 'companies.id', '=', 'contacts.company_id')->orderBy('companies.name');
  }

  public function scopeOrderByField($query, $field)
  {

    if ($field === 'name') {
      $query->orderByName();
    } elseif ($field === 'company') {
      $query->orderByCompany();
    } elseif ($field === 'last_interaction') {
      $query->orderByLastInteractionDate();
    }

    // $sortableFields = [
    //   'name' => 'name',
    //   'company' => 'company',
    //   'last_interaction' => 'last_interaction_date',
    // ];

    // if (array_key_exists($field, $sortableFields)) {
    //   $query->orderBy($sortableFields[$field]);
    // }
  }
}
