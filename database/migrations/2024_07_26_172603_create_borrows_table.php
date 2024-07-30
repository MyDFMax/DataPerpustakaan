<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('borrows', function (Blueprint $table) {
      $table->uuid('id');
      $table->foreignUuid('user_uuid')->references('uuid')->on('users');
      $table->foreignUuid('book_uuid')->references('uuid')->on('books');
      $table->enum('status', ['pending', 'accept', 'reject', 'returned'])->default('pending');
      $table->timestamp('returned_at')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('borrows');
  }
};
