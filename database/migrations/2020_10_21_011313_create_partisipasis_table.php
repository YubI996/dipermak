<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartisipasisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partisipasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('keg_id')->unsigned();
            $table->integer('rt_id')->unsigned();
            $table->text('deskripsi');
            $table->enum('jenis', ['Barang','Jasa','Uang']);
            $table->string('nominal');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('keg_id')->references('id')->on('kegiatans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rt_id')->references('id')->on('rts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partisipasis');
    }
}
