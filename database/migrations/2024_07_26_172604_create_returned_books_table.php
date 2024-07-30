<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('returned_books', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('book_id')->references('id')->on('books');
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->timestamp('returned_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returned_books');
    }
};
