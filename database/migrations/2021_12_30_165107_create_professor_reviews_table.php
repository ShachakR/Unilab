<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_reviews', function (Blueprint $table) {
            $table->id();
            $table->double('professor_rating');
            $table->double('difficulty_rating');
            $table->boolean('take_again'); // would take again? 
            $table->longText('description');
            $table->string('username');
            $table->unsignedBigInteger('professor_id');
            $table->timestamps();

            
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_reviews');
    }
}
