<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_data', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->json('genre');
            $table->json('actor');
            $table->json('characterName');
            $table->string('director');
            $table->string('releaseDate');
            $table->string('thumbnail');
            $table->string('background');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_data');
    }
}
