<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('relawan')){
          Schema::create('relawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_identitas');
            $table->string('no_telp');
            $table->string('email');
            $table->integer('jenis_kel',false,true)->default(0);
            $table->text('alamat');
            $table->integer('kecamatan_id');
            $table->integer('kelurahan_id');
            $table->integer('no_tps');
            $table->string('foto');
            $table->timestamps();
          });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relawan');
    }
}
