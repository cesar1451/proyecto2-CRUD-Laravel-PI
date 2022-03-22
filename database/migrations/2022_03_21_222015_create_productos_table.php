<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();                  
            $table->bigInteger('codigo')->nullable(false);                                  
            $table->float('precio')->nullable(false); 
            $table->string('marca', 50)->nullable();       
            $table->string('color', 50)->nullable(false);  
            $table->integer('cantidad')->unsigned();   
            $table->string('tipo', 50)->nullable(false);            
            $table->string('descripcion', 100)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
};
