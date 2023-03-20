<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categorias extends Migration
{
    
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->engine="InnoDB"; //borrado en cascada

            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        
    }
}
