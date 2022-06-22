<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps', function (Blueprint $table) {
            $table->id();
            $table->double('umur');
            $table->double('berat');
            $table->double('tinggi');
            $table->double('lkkepala');
            $table->double('jarak');
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
        Schema::dropIfExists('temps');
    }
}
