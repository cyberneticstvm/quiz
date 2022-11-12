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
        Schema::create('strength', function (Blueprint $table) {
            $table->id();
            $table->char('category', 1)->unique();
            $table->string('outcome', 15)->unique();
            $table->string('font_color', 15)->unique();
            $table->string('bg_color', 15)->unique();
            $table->string('img_name', 25)->unique();
            $table->string('img_name1', 25)->unique();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strength');
    }
};
