<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
  use HasFactory, HasUuids;

  /**
   * The fields that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'description',
    'author',
    'published',
  ];

  /**
   * Get the user associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function published(): BelongsTo
  {
    return $this->belongsTo(User::class,'published_id','id');
  }

  public function borrowed(): HasMany
  {
    return $this->hasMany(Borrow::class);
  }
}
