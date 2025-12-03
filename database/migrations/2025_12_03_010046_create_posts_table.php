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
        Schema::create('posts', function (Blueprint $table) {
             $table->increments('postID');
            $table->string('title');
            $table->text('content')->nullable();
            $table->integer('userID')->unsigned()->nullable();
            $table->integer('foodID')->unsigned()->nullable();
            $table->dateTime('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('userID')
                  ->references('userID')->on('users');

            $table->foreign('foodID')
                  ->references('foodID')->on('foods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
