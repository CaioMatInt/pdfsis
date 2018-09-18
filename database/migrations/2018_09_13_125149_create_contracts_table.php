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
            $table->mediumText('object');
            $table->mediumText('description');
            $table->mediumText('requiriments');
            $table->mediumText('exceptions');
            $table->mediumText('additional');
            $table->mediumText('team');
            $table->mediumText('deadline');
            $table->mediumText('budget');
            $table->mediumText('payment_options');
            $table->mediumText('maintenance');
            $table->mediumText('infra');
            $table->mediumText('sustentation');
            $table->mediumText('expiration');
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
