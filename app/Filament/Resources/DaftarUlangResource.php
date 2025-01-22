<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarUlangResource\Pages;
use App\Filament\Resources\DaftarUlangResource\RelationManagers;
use App\Models\DaftarUlang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;  // Pastikan ini ada
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;


class DaftarUlangResource extends Resource
{
    protected static ?string $model = DaftarUlang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Formulir Daftar Ulang';
    protected static ?string $slug = 'formulir-daftar-ulang';
    protected static ?string $label = 'Formulir Daftar Ulang';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Formulir Pendaftaran';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([   
                Select::make('user_id')
    ->default(auth()->id()) // Isi dengan ID user yang sedang login
    ->hidden(),
        
                TextInput::make('nama_lengkap_ayah')
                    -> required()
                    -> label('Nama Lengkap Ayah Kandung')
                    -> placeholder('Silahkan masukkan nama lengkap...'),
                TextInput::make('nik_ayah')
                    -> required()
                    -> label('NIK')
                    -> placeholder('Silahkan masukkan NIK...'),    
                TextInput::make('tempat_lahir_ayah')
                    -> required()
                    -> label('Tempat Lahir')
                    -> placeholder('Silahkan masukkan tempat lahir...'),   
                    DatePicker::make('tanggal_lahir_ayah')
                    -> required()
                    -> label('Tanggal Lahir')
                    -> placeholder('Silahkan masukkan tanggal lahir...'), 
                Select::make('status_ayah')
                    -> required()
                    -> label('Status')
                    -> placeholder('Silahkan pilih...')
                        ->options([
                            'hidup' => 'Masih Hidup',
                            'meninggal' => 'Meninggal Dunia',
                        ]),     
                Select::make('pendidikan_terakhir_ayah')
                        -> required()
                        -> label('Pendidikan Terakhir')
                        -> placeholder('Silahkan pilih...')
                            ->options([
                                'sd' => 'Sekolah Dasar',
                                'smp' => 'SMP/Sederajat',
                                'sma' => 'SMA/Sederajat',
                                's1' => 'S1',
                                's2' => 'S2',
                            ]),    
                    Select::make('pekerjaan_ayah')
                            -> required()
                            -> label('Pekerjaan')
                            -> placeholder('Silahkan pilih...')
                                ->options([
                                    'wiraswasta' => 'Wiraswasta',
                                    'buruh' => 'Buruh',
                                    'pegawai_swasta' => 'Pegawai Swasta',
                                    'pegawai_negri' => 'Pegawai Negri',
                                ]),     
                        Select::make('domisili_ayah')
                                -> required()
                                -> label('Domisili')
                                -> placeholder('Silahkan pilih...')
                                    ->options([
                                        'dalam_negri' => 'Dalam Negri',
                                        'luar_negri' => 'Luar Negri',
                                    ]),   
                        TextInput::make('handphone_ayah')
                                    -> label('Nomor Handphone')
                                    -> numeric()
                                    -> placeholder('Silahkan masukkan nomor handphone...'),  
                            Select::make('penghasilan_ayah')
                                    -> required()
                                    -> label('Penghasilan Rata-rata')
                                    -> placeholder('Silahkan pilih...')
                                        ->options([
                                            '1' => '1 Juta',
                                            '2' => '1-3 Juta',
                                            '3' => '3-6 Juta',
                                            '4' => '6-10 Juta',
                                            '5' => '10-15 Juta',
                                            '6' => '15-20 Juta',
                                            '7' => '20-30 Juta',
                                            '8' => '30-40 Juta',
                                            '9' => '40-50 Juta',
                                            '10' => 'Di atas 50 Juta',
                                        ]),    
                            Textarea::make('alamat_ayah')
                                        -> required()
                                        -> label('Alamat'),
                                Select::make('status_tempat_tinggal_ayah')
                                        -> required()
                                        -> label('Status Tempat Tinggal')
                                        -> placeholder('Silahkan pilih...')
                                            ->options([
                                                'sewa' => 'Sewa',
                                                'milik_sendiri' => 'Milik Sendiri',
                                                'orangtua' => 'Milik Orang Tua',
                                            ]),  
                                    FileUpload::make('ktp_ayah')
                                            -> required()
                                            -> label('Upload KTP')
                                            -> placeholder('Silahkan unggah disini...'),
                                    FileUpload::make('kartu_keluarga')
                                            -> required()
                                            -> label('Upload Kartu Keluarga')
                                            -> placeholder('Silahkan unggah disini...'),

            
                                            TextInput::make('nama_lengkap_ibu')
                                            -> required()
                                            -> label('Nama Lengkap Ibu Kandung')
                                            -> placeholder('Silahkan masukkan nama lengkap...'),
                                        TextInput::make('nik_ibu')
                                            -> required()
                                            -> label('NIK')
                                            -> placeholder('Silahkan masukkan NIK...'),    
                                        TextInput::make('tempat_lahir_ibu')
                                            -> required()
                                            -> label('Tempat Lahir')
                                            -> placeholder('Silahkan masukkan tempat lahir...'),   
                                            DatePicker::make('tanggal_lahir_ibu')
                                            -> required()
                                            -> label('Tanggal Lahir')
                                            -> placeholder('Silahkan masukkan tanggal lahir...'), 
                                        Select::make('status_ibu')
                                            -> required()
                                            -> label('Status')
                                            -> placeholder('Silahkan pilih...')
                                                ->options([
                                                    'hidup' => 'Masih Hidup',
                                                    'meninggal' => 'Meninggal Dunia',
                                                ]),     
                                        Select::make('pendidikan_terakhir_ibu')
                                                -> required()
                                                -> label('Pendidikan Terakhir')
                                                -> placeholder('Silahkan pilih...')
                                                    ->options([
                                                        'sd' => 'Sekolah Dasar',
                                                        'smp' => 'SMP/Sederajat',
                                                        'sma' => 'SMA/Sederajat',
                                                        's1' => 'S1',
                                                        's2' => 'S2',
                                                    ]),    
                                            Select::make('pekerjaan_ibu')
                                                    -> required()
                                                    -> label('Pekerjaan')
                                                    -> placeholder('Silahkan pilih...')
                                                        ->options([
                                                            'ibu_rumah_tangga' => 'Ibu Rumah Tangga',
                                                            'wiraswasta' => 'Wiraswasta',
                                                            'buruh' => 'Buruh',
                                                            'pegawai_swasta' => 'Pegawai Swasta',
                                                            'pegawai_negri' => 'Pegawai Negri',
                                                        ]),     
                                                Select::make('domisili_ibu')
                                                        -> required()
                                                        -> label('Domisili')
                                                        -> placeholder('Silahkan pilih...')
                                                            ->options([
                                                                'dalam_negri' => 'Dalam Negri',
                                                                'luar_negri' => 'Luar Negri',
                                                            ]),   
                                                TextInput::make('handphone_ibu')
                                                            -> label('Nomor Handphone')
                                                            -> numeric()
                                                            -> placeholder('Silahkan masukkan nomor handphone...'),  
                                                    Select::make('penghasilan_ibu')
                                                            -> required()
                                                            -> label('Penghasilan Rata-rata')
                                                            -> placeholder('Silahkan pilih...')
                                                                ->options([
                                                                    '1' => '1 Juta',
                                                                    '2' => '1-3 Juta',
                                                                    '3' => '3-6 Juta',
                                                                    '4' => '6-10 Juta',
                                                                    '5' => '10-15 Juta',
                                                                    '6' => '15-20 Juta',
                                                                    '7' => '20-30 Juta',
                                                                    '8' => '30-40 Juta',
                                                                    '9' => '40-50 Juta',
                                                                    '10' => 'Di atas 50 Juta',
                                                                ]),    
                                                    Textarea::make('alamat_ibu')
                                                                -> required()
                                                                -> label('Alamat'),
                                                        Select::make('status_tempat_tinggal_ibu')
                                                                -> required()
                                                                -> label('Status Tempat Tinggal')
                                                                -> placeholder('Silahkan pilih...')
                                                                    ->options([
                                                                        'sewa' => 'Sewa',
                                                                        'milik_sendiri' => 'Milik Sendiri',
                                                                        'orangtua' => 'Milik Orang Tua',
                                                                    ]),  
                                                            FileUpload::make('ktp_ibu')
                                                                    -> required()
                                                                    -> label('Upload KTP')
                                                                    -> placeholder('Silahkan unggah disini...'),
                                                               
            

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')  // Mengambil nama pengguna dari relasi user
                ->label('Nama Siswa')
                ->sortable()
                ->searchable(),
                TextColumn::make('nama_lengkap_ayah')-> label('Nama Ayah')-> searchable(),
                TextColumn::make('nama_lengkap_ibu')-> label('Nama Ibu')-> searchable(),
                ImageColumn::make('kartu_keluarga')-> label('Kartu Keluarga')->circular(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListDaftarUlangs::route('/'),
            'create' => Pages\CreateDaftarUlang::route('/create'),
            'edit' => Pages\EditDaftarUlang::route('/{record}/edit'),
        ];
    }    
    public static function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id(); // Mengisi user_id otomatis
    return $data;
}

public static function mutateFormDataBeforeSave(array $data): array
{
    $data['user_id'] = auth()->id();
    return $data;
}

public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    // Cek apakah pengguna adalah super_admin atau bukan
    if (!auth()->user()->hasRole('super_admin')) {
        $query->where('user_id', auth()->id()); // Hanya pendaftaran milik pengguna yang ditampilkan
    }

    return $query;
}


}
