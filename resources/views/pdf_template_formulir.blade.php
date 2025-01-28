<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULIR</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        td, th {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        .logo-cell {
            width: 30%;
            text-align: center;
        }
        .text-cell {
            width: 70%;
            text-align: center;
            font-size: 15px;
        }
        .photo-cell {
            text-align: center;
            vertical-align: top;
        }
        .photo img {
            width: 100px;
            height: auto;
            border: 1px solid #ddd;
        }
        .confirmation {
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
        }
        .footer {
            margin-top: 20px;
        }
        .footer td {
            vertical-align: top;
        }
        .footer .left-column {
            width: 50%;
            text-align: center;
        }
        .footer .right-column {
            width: 50%;
        }
    </style>
</head>
<body>
    <table>
        <!-- Header Section (Logo and Title in Two Columns) -->
        <tr>
            <td class="logo-cell">
            <img src="{{ asset('storage/logo.jpg') }}" alt="Logo">
            </td>
            <td class="text-cell">
                <h3>FORMULIR</h3>
            </td>
        </tr>
        <!-- Details Section -->
        <tr>
            <th>No. Peserta</th>
            <td>PPDB.622823{{ $record->id }}</td>
        </tr>
        <tr>
            <th>Ruang Ujian</th>
            <td>{{ $record->user->ruang->name }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $record->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $record->nik }}</td>
        </tr>
        <tr>
            <th>NISN</th>
            <td>{{ $record->nisn }}</td>
        </tr>
        <tr>
            <th>KIP</th>
            <td>{{ $record->kip }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $record->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Agama</th>
            <td>{{ $record->agama }}</td>
        </tr>
        <tr>
            <th>Jumlah Saudara</th>
            <td>{{ $record->jumlah_saudara }}</td>
        </tr>
        <tr>
            <th>Anak Ke</th>
            <td>{{ $record->anak_ke }}</td>
        </tr>
        <tr>
            <th>Hobi</th>
            <td>{{ $record->hobi }}</td>
        </tr>
        <tr>
            <th>Cita-cita</th>
            <td>{{ $record->citacita }}</td>
        </tr>
        <tr>
            <th>Nomor Handphone</th>
            <td>{{ $record->nomor_handphone }}</td>
        </tr>
        <tr>
            <th>Alamat Email</th>
            <td>{{ $record->alamat_email }}</td>
        </tr>
        <tr>
            <th>Yang membiayai sekolah</th>
            <td>{{ $record->yang_membiayai_sekolah }}</td>
        </tr>
        <tr>
            <th>Kebutuhan Disabilitas</th>
            <td>{{ $record->kebutuhan_disabilitas }}</td>
        </tr>
        <tr>
            <th>Kebutuhan Khusus</th>
            <td>{{ $record->kebutuhan_khusus }}</td>
        </tr>
        <tr>
            <th>Alamat Rumah</th>
            <td>{{ $record->alamat_rumah }}</td>
        </tr>
        <tr>
            <th>Status Tempat Tinggal</th>
            <td>{{ $record->status_tempat_tinggal }}</td>
        </tr>
        <tr>
            <th>Jarak Tempat Tinggal</th>
            <td>{{ $record->jarak_tempat_tinggal }}</td>
        </tr>
        <tr>
            <th>Waktu Tempuh</th>
            <td>{{ $record->waktu_tempuh }}</td>
        </tr>
        <tr>
            <th>Transportasi ke Sekolah</th>
            <td>{{ $record->transportasi_ke_sekolah }}</td>
        </tr>
        <tr>
            <th>Asal Sekolah/Madrasah</th>
            <td>{{ $record->asal_sekolah }}</td>
        </tr>
        <tr>
            <th>Tempat & Tanggal Lahir</th>
            <td>{{ $record->tempat_lahir }}, {{ \Carbon\Carbon::parse($record->tanggal_lahir)->format('d-M-Y') }}</td>
        </tr>
        <tr>
            <th>Sekolah Asal</th>
            <td>{{ $record->asal_sekolah }}</td>
        </tr>
        <tr>
            <th>NILAI RAPORT TERAKHIR</th>
            <td></td>
        </tr>
        <tr>
            <th>Nilai Kelas 4 Semester 1</th>
            <td>{{ $record->rata_rata_nilai_kelas_4_semester_1 }}</td>
        </tr>
        <tr>
            <th>Nilai Kelas 4 Semester 2</th>
            <td>{{ $record->rata_rata_nilai_kelas_4_semester_2 }}</td>
        </tr>
        <tr>
            <th>Nilai Kelas 5 Semester 1</th>
            <td>{{ $record->rata_rata_nilai_kelas_5_semester_1 }}</td>
        </tr>
        <tr>
            <th>Nilai Kelas 5 Semester 2</th>
            <td>{{ $record->rata_rata_nilai_kelas_5_semester_2 }}</td>
        </tr>
        <tr>
            <th>Nilai Kelas 6 Semester 1</th>
            <td>{{ $record->rata_rata_nilai_kelas_6_semester_1 }}</td>
        </tr>
        <tr>
            <th>PRESTASI NON AKADEMIS</th>
            <td></td>
        </tr>
        <tr>
            <th>Jenis Lomba</th>
            <td>{{ $record->jenis_lomba_satu }}</td>
        </tr>
        <tr>
            <th>Prestasi</th>
            <td>{{ $record->prestasi_satu }}</td>
        </tr>
        <tr>
            <th>Tingkat</th>
            <td>{{ $record->tingkat_prestasi_satu }}</td>
        </tr>
        <tr>
            <th>BIODATA ORANGTUA LAKI-LAKI</th>
            <td></td>
        </tr>
        <tr>
            <th>Nama Lengkap Ayah Kandung</th>
            <td>{{ optional($record->user->daftarulang)->nama_lengkap_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ optional($record->user->daftarulang)->nik_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Tempat & Tanggal Lahir</th>
            <td>{{ optional($record->user->daftarulang)->tanggal_lahir_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ optional($record->user->daftarulang)->status_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Pendidikan Terakhir</th>
            <td>{{ optional($record->user->daftarulang)->pendidikan_terakhir_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ optional($record->user->daftarulang)->pekerjaan_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Domisili</th>
            <td>{{ optional($record->user->daftarulang)->domisili_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Nomor Handphone</th>
            <td>{{ optional($record->user->daftarulang)->handphone_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Penghasilan Rata-rata</th>
            <td>{{ optional($record->user->daftarulang)->penghasilan_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ optional($record->user->daftarulang)->alamat_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Status Tempat Tinggal</th>
            <td>{{ optional($record->user->daftarulang)->status_tempat_tinggal_ayah ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>BIODATA ORANGTUA PEREMPUAN</th>
            <td></td>
        </tr>
        <tr>
            <th>Nama Lengkap Ibu Kandung</th>
            <td>{{ optional($record->user->daftarulang)->nama_lengkap_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ optional($record->user->daftarulang)->nik_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Tempat & Tanggal Lahir</th>
            <td>{{ optional($record->user->daftarulang)->tempat_lahir_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ optional($record->user->daftarulang)->status_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Pendidikan Terakhir</th>
            <td>{{ optional($record->user->daftarulang)->pendidikan_terakhir_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ optional($record->user->daftarulang)->pekerjaan_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Domisili</th>
            <td>{{ optional($record->user->daftarulang)->domisili_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Nomor Handphone</th>
            <td>{{ optional($record->user->daftarulang)->handphone_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Penghasilan Rata-rata</th>
            <td>{{ optional($record->user->daftarulang)->penghasilan_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ optional($record->user->daftarulang)->alamat_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Status Tempat Tinggal</th>
            <td>{{ optional($record->user->daftarulang)->status_tempat_tinggal_ibu ?? 'Data tidak tersedia' }}</td>
        </tr>
        
    </table>
</body>
</html>
