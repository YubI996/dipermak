<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_rt', 20);
            $table->integer('kel_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kel_id')->references('id')->on('kelurahans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rts');
    }
}
