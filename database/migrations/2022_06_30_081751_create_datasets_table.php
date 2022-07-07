<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->double('du');
            $table->double('dbb');
            $table->double('dtb');
            $table->double('dlkkepala');
            $table->double('jarak');
            $table->enum('dgizi', ['1', '2', '3', '4']);
            $table->enum('dberat', ['1', '2', '3', '4']);
            $table->enum('dtinggi', ['1', '2', '3', '4']);
            $table->enum('dstunting', ['1', '2', '3', '4']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datasets');
    }
}
