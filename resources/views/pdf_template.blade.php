<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda Bukti Pendaftaran PPDB</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .header-table td {
            padding: 8px;
            vertical-align: top;
            text-align: center;
        }
        .header-table .logo-cell {
            width: 30%;
            text-align: left;
        }
        .header-table .text-cell {
            width: 70%;
            text-align:left;
            font-size:15xpx;
        }
        .header-table img {
            width: 100px;
            height: auto;
        }
        .registration-info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .registration-info-table th, .registration-info-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            width: 25%;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }
        .details-table th, .details-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .details-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        .details-table td {
            width: 20%;
        }
        .photo-cell {
            text-align: center;
            vertical-align: top;
            width: 20%;
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
    </style>
</head>
<body>
    <table class="header-table">
        <tr>
            <td class="logo-cell">
                <img src="/storage/app/public/logo.jpg" alt="Logo">
            </td>
            <td class="text-cell">
                <h3>PENERIMAAN PESERTA DIDIK BARU</h3>
                <h3>MTS NEGERI 1 TANGERANG</h3>
                <h3>TAHUN PELAJARAN 2025/2026</h3>
            </td>
        </tr>
    </table>

    <table class="registration-info-table">
        <tr>
            <th>No. Pendaftaran</th>
            <td>PPDB.622823{{ $record->id }}</td>
            <th>Tanggal Pendaftaran</th>
            <td>{{ $record->created_at->format('d-m-Y') }}</td>
        </tr>
    </table>

    <table class="details-table">
        <tr>
            <td rowspan="6" class="photo-cell">
                <img src="{{ $record->pasphoto }}" alt="Pas Foto {{ $record->nama_lengkap }}">
            </td>
            <th>Nama Lengkap</th>
            <td>{{ $record->nama_lengkap }}</td>
            <th>Tempat Lahir</th>
            <td>{{ $record->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ \Carbon\Carbon::parse($record->tanggal_lahir)->format('d-m-Y') }}</td>
            <th>Jenis Kelamin</th>
            <td>{{ $record->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>NISN</th>
            <td>{{ $record->nisn }}</td>
            <th>Sekolah Asal</th>
            <td>{{ $record->asal_sekolah }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $record->alamat_rumah }}</td>
            <th>Email Pendaftaran</th>
            <td>{{ $record->alamat_email }}</td>
        </tr>
    </table>

    <div class="confirmation">
        <h3>MTS NEGERI 1 TANGERANG MENYATAKAN DOKUMEN INI ADALAH BUKTI SAH PENDAFTARAN</h3>
    </div>
</body>
</html>
