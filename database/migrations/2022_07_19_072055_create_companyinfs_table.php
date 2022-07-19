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
        Schema::create('companyinfs', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('title_reg');
            $table->longText('title_vat');
            $table->longText('title_databox');
            $table->longText('title_additional');
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
        Schema::dropIfExists('companyinfs');
    }
};
