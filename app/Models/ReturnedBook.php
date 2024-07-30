<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;

class ReturnedBook extends Model
{
  use HasFactory, HasApiTokens;

  protected $fillable = [
    'book_id',
    'user_id',
    'return_date',
  ];

  public function book() : BelongsToMany
  {
    return $this->belongsToMany(Book::class);
  }

  public function user() : BelongsToMany
  {
    return $this->belongsToMany(User::class);
  }
}
