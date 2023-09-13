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
        Schema::create('post_users', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreignId('post_id');
            $table->foreign('post_id')->on('posts')->references('id')->cascadeOnDelete();
            $table->primary(['user_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_users');
    }
};
