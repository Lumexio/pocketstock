<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
            $table->string('name');
            $table->integer('quantity');
            $table->longText('description')->nullable('NULL');
            $table->foreignId('category_id')->nullable('NULL')->references('id')->on('categories');
            $table->foreignId('rack_id')->nullable('NULL')->references('id')->on('racks');
            $table->foreignId('crossbar_id')->nullable('NULL')->references('id')->on('crossbars');
            $table->foreignId('status_id')->nullable('NULL')->references('id')->on('status');
            $table->string('foto_articulo')->nullable('NULL');
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
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
