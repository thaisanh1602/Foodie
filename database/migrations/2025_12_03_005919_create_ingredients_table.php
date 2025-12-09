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
        Schema::create('ingredients', function (Blueprint $table) {
             $table->increments('ingredientID');
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('category_id')->nullable();

        $table->foreign('category_id')
              ->references('categoryID')->on('categories')
              ->onDelete('set null'); // Nếu xóa danh mục, nguyên liệu sẽ không bị xóa mà category_id về null
        
        $table->timestamps(); // Nên có thêm created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
