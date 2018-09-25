<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('type');
            $table->string('password');
            $table->mediumText('signature')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Dev',
            'email' => 'developer@everysystem.com.br',
            'password' => bcrypt('@every1'),
            'type' => 'admin',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            'signature' => "<br><br>
            <div class='assinatura'><p>Atenciosamente, 
            <p>
            <p>Renan Fuentes - CEO </p>
            <p>Tel: +55 (19) 3243-0173 </p>
            <p>Cel: +55 (19) 9 9717-9845 </p>
            <p>Cel: +55 (11) 9 8696-7937 </p>
            </p>Site: www.everysystem.com.br </p></div>
"
        ]);
           DB::table('users')->insert([
            'name' => 'Usuario comum',
            'email' => 'comum@comum.com',
            'password' => bcrypt('123456'),
            'type' => 'common',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            'signature' => "<br><br>
            <div class='assinatura'><p>Atenciosamente, 
            <p>
            <p>comum </p>
            <p>Tel: +55 (19) 9999999 </p>
            <p>Cel: +55 (19) 99999999 </p>
            <p>Cel: +55 (11) 99999999</p>
            </p>Site: www.everysystem.com.br </p></div>
            "
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
