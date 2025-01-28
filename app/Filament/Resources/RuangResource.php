<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RuangResource\Pages;
use App\Filament\Resources\RuangResource\RelationManagers;
use App\Models\Ruang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class RuangResource extends Resource
{
    protected static ?string $model = Ruang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = 'ruang-ujian-siswa';
    protected static ?string $label = 'Ruang Ujian';
    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    -> required()
                    -> label('Nama Ruangan')
                    -> placeholder('Silahkan masukkan nama ruangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')-> label('Nomor Ruang Ujian')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRuangs::route('/'),
            'create' => Pages\CreateRuang::route('/create'),
            'edit' => Pages\EditRuang::route('/{record}/edit'),
        ];
    }    
}
