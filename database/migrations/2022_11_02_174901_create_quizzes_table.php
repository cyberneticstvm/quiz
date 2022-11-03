<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->json('q1')->nullable();
            $table->json('q2')->nullable();
            $table->json('q3')->nullable();
            $table->json('q4')->nullable();
            $table->json('q5')->nullable();
            $table->json('q6')->nullable();
            $table->json('q7')->nullable();
            $table->json('q8')->nullable();
            $table->json('q9')->nullable();
            $table->json('q10')->nullable();
            $table->json('q11')->nullable();
            $table->json('q12')->nullable();
            $table->json('q13')->nullable();
            $table->json('q14')->nullable();
            $table->json('q15')->nullable();
            $table->json('q16')->nullable();
            $table->json('q17')->nullable();
            $table->json('q18')->nullable();
            $table->String('category', 1)->nullable();
            $table->String('outcome', 3)->nullable();
            $table->String('first_name', 50)->nullable();
            $table->String('email', 50)->nullable();
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
        Schema::dropIfExists('quizzes');
    }
};
