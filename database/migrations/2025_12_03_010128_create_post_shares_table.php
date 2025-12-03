<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_shares', function (Blueprint $table) {
            $table->integer('postID')->unsigned();
            $table->integer('userID')->unsigned();
            $table->dateTime('sharedAt')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->primary(['postID', 'userID']);

            $table->foreign('postID')
                  ->references('postID')->on('posts')
                  ->onDelete('cascade');

            $table->foreign('userID')
                  ->references('userID')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_shares');
    }
};
