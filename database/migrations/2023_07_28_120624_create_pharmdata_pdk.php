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
        Schema::create('pharmdata_pdk', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('pdk',60);
            $table->string('ean',60);
            $table->string('sukl');
            $table->string('nomen');
            $table->string('name',255);
            $table->string('sale_able');
            $table->integer('temp_max');
            $table->string('manufacturer',20);
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
        Schema::dropIfExists('pharmdata_pdk');
    }
};
