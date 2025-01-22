<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KARTU TES</title>
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
                <img src="/storage/app/public/logo.jpg" alt="Logo">
            </td>
            <td class="text-cell">
                <h3>KARTU TES</h3>
            </td>
        </tr>
        <!-- Details Section -->
        <tr>
            <th>No. Peserta</th>
            <td>PPDB.622823{{ $record->id }}</td>
        </tr>
        <tr>
            <th>Ruang Ujian</th>
            <td>{{ $record->ruang_ujian }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $record->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Tempat & Tanggal Lahir</th>
            <td>{{ $record->tempat_lahir }}, {{ \Carbon\Carbon::parse($record->tanggal_lahir)->format('d-M-Y') }}</td>
        </tr>
        <tr>
            <th>Sekolah Asal</th>
            <td>{{ $record->asal_sekolah }}</td>
        </tr>
    </table>

    <!-- Footer Section (2 Columns) -->
    <table class="footer">
        <tr>
        <td class="left-column" style="text-align: center;">
    <div class="photo" style="border: 1px solid #000000; width: 100px; height: 150px; display: flex; justify-content: center; align-items: center; font-size: 12px; text-align: center; margin: 20px auto;">
        Photo 2x3
    </div>
</td>


            <td class="right-column">
                <p><strong>Tangerang, <?php echo date('d F Y'); ?></strong></p>
                <p><strong>Kepala Madrasah</strong></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p><strong>Drs. Muksil M.Pd</strong></p>
                <p><strong>NIP.</strong> 123456778899</p>
            </td>
        </tr>
    </table>
</body>
</html>
