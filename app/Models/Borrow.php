<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Laravel\Sanctum\HasApiTokens;

class Borrow extends Model
{
  use HasFactory, HasApiTokens;

  protected $fillable = [
    'book_id',
    'user_id',
    'status',
    'returned_at',
  ];

  public function book()
  {
    return $this->belongsTo(Book::class, 'book_id', 'id');
  }
  
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }
  
  public function borrowedBook(): HasOneThrough
  {
    return $this->hasOneThrough(User::class, Book::class);
  }

  public function acceptBorrow($id)
  {
    Borrow::updateOrCreate($id, [
      'status'=>'accept',
      'returned_at'=>now(),
    ]);
  }

  public function rejectBorrow($id)
  {
    Borrow::updateOrCreate($id, [
      'status'=>'reject',
      'returned_at'=>now(),
    ]);
  }

  public function returnBook($id,$user,$book)
  {
    Borrow::updateOrCreate($id, [
      'status'=>'returned',
    ]);
    ReturnedBook::create([
      'book_id' => $book,
      'user_id' => $user,
      'returned_at'=>now(),
    ]);
  }
}
