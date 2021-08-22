<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->unique();
            $table->string('slug');
            $table->string('image');
            $table->longText('details');
            $table->integer('category_id')->unsigned();
            $table->enum('publier', ['1', '0']);
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status')->default('0');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('articles');
    }
}
