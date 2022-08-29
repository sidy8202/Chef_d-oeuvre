<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandescersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandescers', function (Blueprint $table) {
            $table->id();
            $table->string('type'); 
            $table->string('objet'); 
            
            $table->string('document')->nullable();
            $table->string('motifrejet')->nullable();
            $table->string('status')->nullable();



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
        Schema::dropIfExists('demandescers');
    }
}
