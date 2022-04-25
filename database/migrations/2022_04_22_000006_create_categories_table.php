<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->boolean('is_default')->default(0)->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('is_featured')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
