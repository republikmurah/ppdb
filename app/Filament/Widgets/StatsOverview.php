<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Pendaftaran;
use App\Models\DaftarUlang;
use Filament\Tables\Columns\TextColumn;


class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $jumlahPendaftar = Pendaftaran::count(); 
        $jumlahPendaftarUlang = DaftarUlang::count();
        $jumlahLulus = Pendaftaran::where('is_lulus', '1')->count();
        $jumlahTidakLulus = Pendaftaran::where('is_lulus', '0')->count();

        return [
            Card::make('Jumlah Pendaftar', $jumlahPendaftar),
            Card::make('Daftar Ulang', $jumlahPendaftarUlang),
            Card::make('Siswa Lulus', $jumlahLulus),
            Card::make('Siswa Tidak Lulus', $jumlahTidakLulus),
        ];
    }

    

}

