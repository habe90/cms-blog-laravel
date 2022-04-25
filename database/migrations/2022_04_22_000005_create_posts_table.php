<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('is_featured')->default(0)->nullable();
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('comments')->default(0)->nullable();
            $table->string('status');
            $table->string('slug');
            $table->string('tags')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
