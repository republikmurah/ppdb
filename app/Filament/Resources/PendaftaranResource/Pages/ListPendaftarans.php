<?php

namespace App\Filament\Resources\PendaftaranResource\Pages;

use App\Filament\Resources\PendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class ListPendaftarans extends ListRecords
{
    protected static string $resource = PendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
}
