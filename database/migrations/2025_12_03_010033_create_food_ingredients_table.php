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
        Schema::create('food_ingredients', function (Blueprint $table) {
            $table->integer('foodID')->unsigned();
            $table->integer('ingredientID')->unsigned();
            $table->string('quantity')->nullable();

            $table->primary(['foodID', 'ingredientID']);

            $table->foreign('foodID')
                  ->references('foodID')->on('foods')
                  ->onDelete('cascade');

            $table->foreign('ingredientID')
                  ->references('ingredientID')->on('ingredients')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_ingredients');
    }
};
