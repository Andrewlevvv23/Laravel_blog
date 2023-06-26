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
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');   //created an intermediate column for posts
            $table->unsignedBigInteger('user_id');   //created an intermediate column for users
            $table->timestamps();

            $table->index('post_id', 'pul_post_idx');    //created a unique index for posts
            $table->index('post_id', 'pul_user_idx');    //created a unique index for users

            $table->foreign('post_id', 'pul_post_fk')->on('posts')->references('id'); //created foreign for post column
            $table->foreign('user_id', 'pul_user_fk')->on('users')->references('id'); //created foreign for user column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_user_likes');
    }
};
