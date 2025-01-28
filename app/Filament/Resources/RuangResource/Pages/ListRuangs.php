<?php

namespace App\Filament\Resources\RuangResource\Pages;

use App\Filament\Resources\RuangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRuangs extends ListRecords
{
    protected static string $resource = RuangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
