<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddfieldOnDemandescer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demandescers', function (Blueprint $table) {
            
            $table->unsignedBigInteger("idrdv")->nullable();
            $table->foreign('idrdv')
                ->references('id')
                ->on('rendezvouses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
