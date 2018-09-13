<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->string('title', 255);
            $table->string('area', 255);
            $table->string('object', 255);
            $table->string('description', 255);
            $table->string('requiriments', 255);
            $table->string('exceptions', 255);
            $table->string('additional', 255);
            $table->string('team', 255);
            $table->string('deadline', 255);
            $table->string('budget', 255);
            $table->string('payment_options', 255);
            $table->string('maintenance', 255);
            $table->string('infra', 255);
            $table->string('sustentation', 255);
            $table->string('expiration', 255);
            $table->string('image', 255)->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
