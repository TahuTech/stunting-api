<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knns', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->double('u');
            $table->double('bb');
            $table->double('tb');
            $table->double('lkkepala');
            $table->enum('gizi', ['1', '2', '3', '4']);
            $table->enum('berat', ['1', '2', '3', '4']);
            $table->enum('tinggi', ['1', '2', '3', '4']);
            $table->enum('stunting', ['1', '2', '3', '4']);
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
        Schema::dropIfExists('knns');
    }
}
