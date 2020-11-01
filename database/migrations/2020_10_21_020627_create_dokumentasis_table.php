<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentasisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('keg_id')->unsigned();
            $table->integer('rt_id')->unsigned();
            $table->string('foto');
            $table->text('keterangan');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('rt_id')->references('id')->on('rts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('keg_id')->references('id')->on('kegiatans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dokumentasis');
    }
}
