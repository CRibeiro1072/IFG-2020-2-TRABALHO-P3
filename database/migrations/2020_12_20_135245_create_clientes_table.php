<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->String('nome', 150);
            $table->String('email', 200);
            $table->String('senha', 150);
            $table->String('cpf', 11);
            $table->String('endereco', 80);
            $table->String('bairro', 80);
            $table->String('cidade', 80);
            $table->String('uf', 2);
            $table->String('telefone', 15);
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
        Schema::dropIfExists('clientes');
    }
}
