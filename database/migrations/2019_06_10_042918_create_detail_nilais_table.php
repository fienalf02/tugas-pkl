<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_nilai')->unsigned();
            $table->foreign('id_nilai')->references('id')->on('nilais')->onDelete('cascade');
            $table->integer('tugas');
            $table->integer('uts');
            $table->integer('uas');
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
        Schema::dropIfExists('detail_nilais');
    }
}
