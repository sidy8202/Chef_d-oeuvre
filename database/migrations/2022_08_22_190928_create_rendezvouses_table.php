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
            $table->string('typedocument');

            $table->date('daterdv')->nullable();
            $table->date('date_retrait')->nullable();

            $table->string('etat')->nullable();
            $table->string('numero_document')->nullable();
            $table->integer('prix')->nullable();
      
            $table->unsignedBigInteger("id_demandesci")->nullable();
            $table->foreign('id_demandesci')
                ->references('id')
                ->on('demandescis')
                ->onDelete('cascade');

                $table->unsignedBigInteger("id_demandescer")->nullable();
                $table->foreign('id_demandescer')
                    ->references('id')
                    ->on('demandescers')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('rendezvouses');
    }
}
