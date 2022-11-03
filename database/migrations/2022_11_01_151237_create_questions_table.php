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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->String('qcode', 3)->unique();
            $table->text('question')->nullable();
            $table->text('header')->nullable();
            $table->text('input')->nullable();
            $table->integer('progress')->default(0);
        });

        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qid');
            $table->text('option')->nullable();
            $table->String('value', 3)->nullable();
            $table->integer('next_question')->nullable();
            $table->integer('prev_question')->nullable();
            $table->foreign('qid')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
        Schema::dropIfExists('options');
    }
};
