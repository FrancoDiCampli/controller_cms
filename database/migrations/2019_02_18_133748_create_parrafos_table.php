<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParrafosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parrafos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('cuerpo');
            $table->string('imagen')->nullable();
            $table->integer('orden');
            $table->unsignedInteger('pagina_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pagina_id')->references('id')->on('paginas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parrafos');
    }
}
