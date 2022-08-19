<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('dpt')){
          Schema::create('dpt', function (Blueprint $table) {
            $table->id();
            $table->integer('provinsi_id');
            $table->integer('kabupaten_id');
            $table->integer('kecamatan_id');
            $table->integer('kelurahan_id');
            $table->integer('tps_id');
            $table->string('no_kk');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->tinyInteger('status_kawin');
            $table->tinyInteger('jenis_kel');
            $table->tinyInteger('disabilitas');
            $table->tinyInteger('status_rekam_ktp');
            $table->text('keterangan');
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
        Schema::dropIfExists('dpt');
    }
}
