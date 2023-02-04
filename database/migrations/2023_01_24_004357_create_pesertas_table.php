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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('tlp')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('provinsi_id')->nullable();
            $table->bigInteger('kota_id')->nullable();
            $table->bigInteger('kecamatan_id')->nullable();
            $table->bigInteger('desa_id')->nullable();
            $table->bigInteger('kelas_id')->nullable();
            $table->bigInteger('kaos_id')->nullable();
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
        Schema::dropIfExists('pesertas');
    }
};
