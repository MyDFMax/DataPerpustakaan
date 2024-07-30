<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class BookPolicy
{
  use HandlesAuthorization;

  public function view(?User $user, Book $perpustakaan)
  {
    // visitors cannot view unpublished items
    if ($user === null) {
      return false;
    }

    // admin overrides published status
    if ($user->can('view unpublished posts')) {
      return true;
    }

    // authors can view their own unpublished posts
    return $user->id == $perpustakaan->user_id;
  }

  public function create(User $user)
  {
    return ($user->can('create posts'));
  }

  public function update(User $user, Book $perpustakaan)
  {
    if ($user->hasRole('user') && $user->can('edit book')) {
      return $user->id == $perpustakaan->user_id;
    }

    if ($user->hasRole('admin') && $user->can('edit book')) {
      return true;
    }

    Log::alert('userlogin : ' . $user->uuid . 'role : ' . $user->getRoleNames() . 'massage : PerpustakaanPolicy update access');
    return false;
  }

  public function delete(User $user, Book $perpustakaan)
  {
    if ($user->hasRole('user') && $user->can('edit book')) {
      return $user->id == $perpustakaan->user_id;
    }
    if ($user->hasRole('admin') && $user->can('delete book')) {
      return true;
    }
    Log::alert('userlogin : ' . $user->uuid . 'role : ' . $user->getRoleNames() . 'massage : PerpustakaanPolicy delete access');
    return false;
  }
}
