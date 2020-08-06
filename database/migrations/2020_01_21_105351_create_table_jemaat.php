<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJemaat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_jemaat', function (Blueprint $table) {
            $table->bigIncrements('jemaat_id');
            $table->string('nama_jemaat',255);
            $table->string('tempat_lahir',255);
            $table->date('tanggal_lahir');
            $table->biginteger('nomor_hp');
            $table->string('foto',255);
            $table->string('jenis_kelamin',255);
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
        Schema::dropIfExists('table_jemaat');
    }


}
