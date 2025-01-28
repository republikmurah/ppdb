<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftarulangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nama_lengkap_ayah');
            $table->string('nik_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tanggal_lahir_ayah');
            $table->string('status_ayah');
            $table->string('pendidikan_terakhir_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('domisili_ayah');
            $table->string('handphone_ayah');
            $table->string('penghasilan_ayah');
            $table->string('alamat_ayah');
            $table->string('status_tempat_tinggal_ayah');
            $table->string('ktp_ayah');
            $table->string('kartu_keluarga');
            $table->string('nama_lengkap_ibu');
            $table->string('nik_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tanggal_lahir_ibu');
            $table->string('status_ibu');
            $table->string('pendidikan_terakhir_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('domisili_ibu');
            $table->string('handphone_ibu');
            $table->string('penghasilan_ibu');
            $table->string('alamat_ibu');
            $table->string('status_tempat_tinggal_ibu');
            $table->string('ktp_ibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftarulangs');
    }
};
