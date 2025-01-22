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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->unique()->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('nisn');
            $table->string('kip');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('pasphoto');
            $table->string('jumlah_saudara');
            $table->string('anak_ke');
            $table->string('hobi');
            $table->string('citacita');
            $table->string('nomor_handphone');
            $table->string('alamat_email');
            $table->string('yang_membiayai_sekolah');
            $table->string('kebutuhan_disabilitas');
            $table->string('kebutuhan_khusus');
            $table->string('alamat_rumah');
            $table->string('status_tempat_tinggal');
            $table->string('jarak_tempat_tinggal');
            $table->string('waktu_tempuh');
            $table->string('transportasi_ke_sekolah');
            $table->string('asal_sekolah');
            $table->string('total_nilai_kelas_4_semester_1');
            $table->string('rata_rata_nilai_kelas_4_semester_1');
            $table->string('bukti_kelas_4_semester_1');
            $table->string('total_nilai_kelas_4_semester_2');
            $table->string('rata_rata_nilai_kelas_4_semester_2');
            $table->string('bukti_kelas_4_semester_2');
            $table->string('total_nilai_kelas_5_semester_1');
            $table->string('rata_rata_nilai_kelas_5_semester_1');
            $table->string('bukti_kelas_5_semester_1');
            $table->string('total_nilai_kelas_5_semester_2');
            $table->string('rata_rata_nilai_kelas_5_semester_2');
            $table->string('bukti_kelas_5_semester_2');
            $table->string('total_nilai_kelas_6_semester_1');
            $table->string('rata_rata_nilai_kelas_6_semester_1');
            $table->string('bukti_kelas_6_semester_1');
            $table->string('jenis_lomba_satu');
            $table->string('prestasi_satu');
            $table->string('tingkat_prestasi_satu');
            $table->string('jenis_lomba_dua');
            $table->string('prestasi_dua');
            $table->string('tingkat_prestasi_dua');
            $table->string('jenis_lomba_tiga');
            $table->string('prestasi_tiga');
            $table->string('tingkat_prestasi_tiga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
        
    }
};
