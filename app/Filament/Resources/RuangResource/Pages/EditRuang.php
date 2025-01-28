<?php

namespace App\Filament\Resources\RuangResource\Pages;

use App\Filament\Resources\RuangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRuang extends EditRecord
{
    protected static string $resource = RuangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
