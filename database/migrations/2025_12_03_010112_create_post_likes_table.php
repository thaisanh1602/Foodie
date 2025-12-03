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
        Schema::create('post_likes', function (Blueprint $table) {
            $table->integer('postID')->unsigned();
            $table->integer('userID')->unsigned();

            $table->primary(['postID', 'userID']);

            $table->foreign('postID')
                ->references('postID')->on('posts')
                ->onDelete('cascade');

            $table->foreign('userID')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_likes');
    }
};
