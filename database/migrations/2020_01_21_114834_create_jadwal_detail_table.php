<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_detail', function (Blueprint $table) {
            $table->biginteger('jemaat_id')->unsigned();
            $table->foreign('jemaat_id')->references('jemaat_id')-> on('jemaat');
             $table->biginteger('jadwal_id')->unsigned();
            $table->foreign('jadwal_id')->references('jadwal_id')-> on('jadwal_ibadah');
            $table->string('status',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_detail');
    }
}
