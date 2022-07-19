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
        Schema::create('about_ceos', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->longText('title');
            $table->longText('subtitle');
            $table->longText('name_ceo');
            $table->longText('position_ceo');
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
        Schema::dropIfExists('about_ceos');
    }
};
