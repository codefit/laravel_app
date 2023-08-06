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
        Schema::create('transport_payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transport')->unsigned()->index();;
            $table->bigInteger('payment')->unsigned()->index();;
            $table->decimal('price');

            $table->foreign('transport')->references('id')->on('transport')->onDelete('cascade');
            $table->foreign('payment')->references('id')->on('payment')->onDelete('cascade');

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
        Schema::dropIfExists('transport_payment');
    }
};
