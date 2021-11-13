<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->integer('idanimal', true);
            $table->string('nome', 45);
            $table->string('apelido', 45)->nullable();
            $table->string('genero', 1)->comment('Macho/Femea
');
            $table->string('idade', 45)->nullable();
            $table->date('data_nascimento');
            $table->string('rgn', 15)->nullable()->comment('Registro Genealógico de Nascimento.');
            $table->string('rgd', 15)->nullable()->comment('Registro Genealógico de Definitivo.');
            $table->string('numero_brinco', 15)->nullable();
            $table->string('numero_sisbov', 15)->nullable();
            $table->integer('peso_entrada')->nullable();
            $table->integer('origem')->nullable()->comment('1-Comprado, 2-Nascido
');
            $table->string('foto')->nullable();
            $table->string('observacao')->nullable();
            $table->integer('propriedade_idpropriedade')->index('fk_animal_propriedade_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
}
