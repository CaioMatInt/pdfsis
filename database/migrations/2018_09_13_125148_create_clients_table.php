<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company', 100);
            $table->string('cnpj', 15);
            $table->string('phone', 25);
            $table->string('address', 100);
            $table->string('contact_name', 50);
            $table->string('image')->nullable();
            $table->string('image_local', 255)->nullable();
         //   $table->string('thumb')->nullable();
            $table->string('email', 100);
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
        Schema::dropIfExists('clients');
    }
}
