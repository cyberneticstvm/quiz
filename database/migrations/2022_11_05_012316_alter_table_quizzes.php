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
        Schema::table('quizzes', function (Blueprint $table) {
            $table->integer('c_per')->default(0);
            $table->integer('i_per')->default(0);
            $table->integer('o_per')->default(0);
            $table->integer('v_per')->default(0);
            $table->integer('a_per')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropColumn('c_per');
            $table->dropColumn('i_per');
            $table->dropColumn('o_per');
            $table->dropColumn('v_per');
            $table->dropColumn('a_per');
        });
    }
};
