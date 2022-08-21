<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('fichier1')->nullable();
            $table->string('fichier2')->nullable();
            $table->string('fichier3')->nullable();

            $table->unsignedBigInteger("id_recep")->nullable();
            $table->foreign('id_recep')
                ->references('id')
                ->on('receptionnistes')
                ->onDelete('cascade');

                $table->unsignedBigInteger("id_admins")->nullable();
                $table->foreign('id_admins')
                    ->references('id')
                    ->on('admins')
                    ->onDelete('cascade');

                    $table->unsignedBigInteger("id_citoi")->nullable();
                    $table->foreign('id_citoi')
                        ->references('id')
                        ->on('citoyens')
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
        Schema::dropIfExists('demandes');
    }
}
