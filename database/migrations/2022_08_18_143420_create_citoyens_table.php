<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitoyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citoyens', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('profile_img');
            $table->string('prenom');
            $table->string('adresse');
            $table->integer('phone');
            $table->string('email');
            $table->string('username');
            $table->string('password');

            $table->unsignedBigInteger("id_users");
            $table->foreign('id_users')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('citoyens');
    }
}
