<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->double('jmlbb');
            $table->double('norm');
            $table->double('stun');
            //gizi
            $table->double('gizle');
            $table->double('gizba');
            $table->double('gizku');
            $table->double('gizbu');
            //tinggi
            $table->double('tintin');
            $table->double('tinnor');
            $table->double('tinpen');
            $table->double('tinspen');
            //berat
            $table->double('berle');
            $table->double('berba');
            $table->double('berku');
            $table->double('bersku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
}