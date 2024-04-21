<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('photo_id');
            $table->timestamps();

            // Definisi foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');

            // Membuat indeks gabungan untuk memastikan user_id dan photo_id unik
            $table->unique(['user_id', 'photo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
