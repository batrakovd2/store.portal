<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('prod_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('rubric_id')->nullable();
            $table->string('up_text', 300)->nullable();
            $table->text('down_text')->nullable();
            $table->string('price', 100)->nullable();
            $table->json('fields')->nullable();
            $table->integer('units')->nullable();
            $table->integer('view')->nullable();
            $table->string('photo')->nullable();
            $table->integer('priority')->nullable();
            $table->string('stock')->nullable();
            $table->integer('rating')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
