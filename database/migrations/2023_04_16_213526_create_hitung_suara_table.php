<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hitung_suara', function (Blueprint $table) {
            $table->id();
            $table->char('kabupaten',7)->nullable()->default(null);
            $table->char('kecamatan',7)->nullable()->default(null);
            $table->char('desa',10)->nullable()->default(null);
            $table->unsignedBigInteger('calon1_id')->default(1);
            $table->unsignedBigInteger('calon2_id')->default(1);
            $table->string('nama_calon1')->nullable()->default(null);
            $table->string('nama_calon2')->nullable()->default(null);
            $table->unsignedInteger('suara1')->default(0);
            $table->unsignedInteger('suara2')->default(0);
            $table->unsignedInteger('suara_tidak_sah')->default(0);
            $table->unsignedTinyInteger('no_tps')->default(1);
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('hitung_suara');
    }
};
