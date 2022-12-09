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
        Schema::create('tbl_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('referencia',255);
            $table->integer('precio');
            $table->integer('peso');
            $table->integer('categoria');
            $table->integer('stock');
            $table->smallInteger('estado');
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
        Schema::dropIfExists('tbl_productos');
    }
};
