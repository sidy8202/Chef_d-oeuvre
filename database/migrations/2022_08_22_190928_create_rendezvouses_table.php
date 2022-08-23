<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezvousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvouses', function (Blueprint $table) {
            $table->id();
            $table->string('commentaires');

            $table->unsignedBigInteger("id_demandesci");
            $table->foreign('id_demandesci')
                ->references('id')
                ->on('demandescis')
                ->onDelete('cascade');

                $table->unsignedBigInteger("id_demandescer");
                $table->foreign('id_demandescer')
                    ->references('id')
                    ->on('demandescers')
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
        Schema::dropIfExists('rendezvouses');
    }
}
