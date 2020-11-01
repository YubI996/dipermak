<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama_keg', 100);
            $table->integer('rt_id')->unsigned();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->boolean('approval')->default(1);
            $table->integer('jen_keg')->unsigned();
            $table->string('pagu');
            $table->string('target');
            $table->string('volume');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('rt_id')->references('id')->on('rts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jen_keg')->references('id')->on('jen_kegs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kegiatans');
    }
}
