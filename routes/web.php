<?php

use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Book\BorrowController;
use App\Http\Controllers\Book\PublishedController;
use Illuminate\Support\Facades\Route;

Route::get('/',function (){
  return redirect(\route('home'));
});
Route::prefix('data_perpustakaan')->group(function () {
  // Route::view maps the root URL ("/") to the welcome view.
  // When a user navigates to the application's root URL, they will see the welcome view.
  Route::view('/', 'welcome')->name('home');

  // It groups the routes that are contained within it. The routes within this group have two middleware, 'auth:sanctum' and 'verified' that provide an authentication layer.
  Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Defines a route for the "/dashboard" URL which would render the 'dashboard' view when accessed
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // This will automatically create multiple routes for the 'Perpustakaan' resource or in your case, routes to handle book related requests. The standard routes created for this would be create, read, update, delete and others
    Route::resource('library', BookController::class)->names('book');
    Route::get('book/borrow/{book}', [BookController::class, 'borrow'])->name('book.borrow');
    Route::resource('borrow', BorrowController::class)->names('borrow');
    Route::post('borrow/approval{borrow}', [BorrowController::class, 'approval'])->name('borrow.approval');
    Route::resource('published', PublishedController::class)->names('published');
    Route::post('published/approval{published}', [PublishedController::class, 'approval'])->name('published.approval');
    Route::post('published/pullout/approval{published}', [PublishedController::class, 'pullout'])->name('published.pullout.approval');
  });

  // The fallback method is used to define a route that will be executed when no other route matches the incoming request.
  Route::fallback(function () {
    // When no other route is matched, the 'error' view is displayed
    return view('layouts.error');
  });
});
