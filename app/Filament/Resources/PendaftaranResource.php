<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Filament\Resources\PendaftaranResource\RelationManagers;
use App\Models\Pendaftaran;
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
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use Filament\Tables\Actions\Action;
use Illuminate\Validation\ValidationException;


class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pendaftaran';
    protected static ?string $slug = 'formulir-tahap-1';
    protected static ?string $label = 'Pendaftaran';
    protected static ?string $navigationGroup = 'Formulir Pendaftaran';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Status Siswa')
                ->description('Tombol ini hanya dapat diakses dan dilihat oleh Admin untuk menentukan status kelulusan siswa & Izin Unduh Formulir')
                ->hidden(!(Auth::user() && Auth::user()->hasRole(['super_admin', 'Administrator']))) // Menyembunyikan section jika bukan admin
                ->schema(function () {
                   // Memeriksa apakah pengguna adalah admin
                      $isAdmin = Auth::user()->hasRole(['super_admin', 'Administrator']);
        
              return [
                Toggle::make('is_lulus')  // Menambahkan field toggle untuk 'is_lulus'
                ->label('Lulus')       // Label untuk field toggle
                ->default(false)       // Nilai default 'Tidak Lulus'
                ->required()           // Opsional: jika Anda ingin field ini wajib diisi
                ->disabled(!$isAdmin)  // Mengunci toggle jika bukan admin
                ->hidden(!$isAdmin) // Menyembunyikan toggle jika bukan admin
                ->helperText($isAdmin ? 'Klik untuk mengubah status kelulusan' : 'Anda tidak dapat mengubah status kelulusan'),  // Menambahkan penjelasan jika bukan admin
                
                Toggle::make('can_download_formulir')
                ->label('Izin Unduh Formulir')
                ->visible(fn($record) => $record && $record->is_lulus)  // Menampilkan toggle hanya jika status lulus
                ->disabled(fn($record) => !$record || !$record->is_lulus)  // Nonaktifkan toggle jika belum lulus
                ->visible(fn() => Auth::user()->hasRole(['super_admin', 'Administrator']))  // Hanya super_admin yang dapat melihat toggle
                ->helperText('Aktifkan toggle ini untuk memberikan izin kepada user untuk mengunduh formulir jika statusnya lulus.'),

        ];
    }),



                TextInput::make('nama_lengkap')
                    -> required()
                    -> label('Nama Lengkap')
                    -> placeholder('Silahkan masukkan nama lengkap...'),
                TextInput::make('nik')
                    -> required()
                    -> label('NIK')
                    -> numeric()
                    -> placeholder('Silahkan masukkan NIK...'),
                TextInput::make('nisn')
                    -> required()
                    -> label('NISN')
                    -> numeric()
                    -> placeholder('Silahkan masukkan NISN...'),
                TextInput::make('kip')
                    -> label('KIP')
                    -> numeric()
                    -> placeholder('Silahkan masukkan KIP...'),
                TextInput::make('tempat_lahir')
                    -> required()
                    -> label('Tempat Lahir')
                    -> placeholder('Silahkan masukkan tempat lahir...'),
                DatePicker::make('tanggal_lahir')
                    -> required()
                    -> label('Tanggal Lahir')
                    -> placeholder('Silahkan masukkan tanggal lahir...'),
                Select::make('jenis_kelamin')
                    -> required()
                    -> label('Jenis Kelamin')
                    -> placeholder('Silahkan pilih...')
                        ->options([
                            'pria' => 'Pria',
                            'wanita' => 'Wanita',
                        ]),
                Select::make('agama')
                    -> required()
                    -> label('Agama')
                    -> placeholder('Silahkan pilih...')
                        ->options([
                            'islam' => 'Islam',
                            'kristen' => 'Kristen Protestan',
                            'kristenkatolik' => 'Kristen Katolik',
                            'budha' => 'Buddha',
                            'hindu' => 'Hindu',
                            'konghucu' => 'Konghucu',
                        ]),
                FileUpload::make('pasphoto')
                    -> required()
                    -> label('Upload Photo')
                    -> placeholder('Silahkan unggah disini...'),
                Select::make('jumlah_saudara')
                    -> label('Jumlah Saudara')
                    -> placeholder('Silahkan pilih...')
                        ->options([
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                            '7' => '7',
                            '8' => '8',
                            '9' => '9',
                            '10' => '10',
                            '11' => '11',
                            '12' => '12',
                        ]),
                Select::make('anak_ke')
                    -> label('Anak Ke')
                    -> placeholder('Silahkan pilih')
                        ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                        '8' => '8',
                        '9' => '9',
                        '10' => '10',
                        '11' => '11',
                        '12' => '12',
                    ]),
                Select::make('hobi')
                    -> label('Hobi')
                    -> placeholder('Silahkan pilih')
                        ->options([
                            '1' => 'Menganalisa Data',
                            '2' => 'Bermain Game',
                            '3' => 'Menggambar',
                            '4' => 'Musik',
                            '5' => 'Memasak',
                            '6' => 'Melukis',
                            '7' => 'Membaca',
                            '8' => 'Menari',
                            '9' => 'Bernyanyi',
                            '10' => 'Menulis',
                            '11' => 'Menonton',
                            '12' => 'Mendengarkan musik',
                            '13' => 'Tidur',
                            '14' => 'Makan',
                            '15' => 'Berenang',
                            '16' => 'Bersepeda',
                            '17' => 'Mengendarai Motor',
                            '18' => 'Berselancar',
                            '19' => 'Mendaki Gunung',
                            '20' => 'Memanjat',
                            '21' => 'Berkemah',
                            '22' => 'Memancing',
                            '23' => 'Berlari',
                            '24' => 'Joging',
                            '25' => 'Jalan-jalan',
                            '26' => 'Fotografi',
                            '27' => 'Mengumpulkan Perangko',
                            '28' => 'Chatting',
                            '29' => 'Bermain Alat Musik',
                            '30' => 'Bermain Sepak Bola',
                            '31' => 'Bermain Bola Basket',
                            '32' => 'Bermain Bola Voli',
                            '33' => 'Bermain Bola Tenis',
                            '34' => 'Bermain Game',
                            '35' => 'Bermain Boneka',
                            '36' => 'Membuat Konten',
                            '37' => 'Edit Video',
                            '38' => 'Bermain Kelereng',
                            '39' => 'Bermain Layangan',
                            '40' => 'Bermain Ketapel',
                            '41' => 'Bermain Tembak-tembakan',
                            '42' => 'Bermain Mobil-mobilan',
                        ]),
                Select::make('citacita')
                    -> label('Cita-cita')
                    -> placeholder('Silahkan pilih...')
                        ->options([
                            '1' => 'Guru',
                            '2' => 'Peneliti',
                            '3' => 'Penulis',
                            '4' => 'Psikolog',
                            '5' => 'Software Engineer',
                            '6' => 'Data Scientist',
                            '7' => 'Pengembang Website',
                            '8' => 'Insinyur',
                            '9' => 'Pejabat',
                            '10' => 'Cybersecurity',
                            '11' => 'Seniman',
                            '12' => 'Sutradara',
                            '13' => 'Musisi atau Penyanyi',
                            '14' => 'Animator',
                            '15' => 'Dokter',
                            '16' => 'Perawat',
                            '17' => 'Aktivis',
                            '18' => 'Pegawai Negeri',
                            '19' => 'Pengacara',
                            '20' => 'Pengusaha',
                            '21' => 'Akuntan',
                            '22' => 'Auditor',
                            '23' => 'Manajer Keuangan',
                            '24' => 'Astronot',
                            '25' => 'Pilot',
                            '26' => 'Atlit',
                            '27' => 'Arsitek',
                            '28' => 'Ahli IT',
                            '29' => 'Chef',
                            '30' => 'Konten Kreator',
                            '31' => 'Polisi',
                            '32' => 'TNI',
                            '33' => 'Presiden',
                            '34' => 'Pemuka Agama',
                        ]),
                TextInput::make('nomor_handphone')
                    -> label('Nomor Handphone')
                    -> numeric()
                    -> placeholder('Silahkan masukkan nomor handphone...'),
                TextInput::make('alamat_email')
                    -> required()
                    -> placeholder('Silahkan masukkan alamat email...'),
                Select::make('yang_membiayai_sekolah')
                    -> required()
                    -> label('Yang Membiayai Sekolah')
                    -> placeholder('Silahkan pilih...')
                        ->options([
                            'sendiri' => 'Sendiri',
                            'orangtua' => 'Orang Tua',
                            'wali' => 'Wali',
                        ]),
                Select::make('kebutuhan_disabilitas')
                    -> required()
                    -> label('Kebutuhan Disabilitas')
                    -> placeholder('Silahkan pilih...')
                        ->options([
                            'ya' => 'Ya',
                            'tidak' => 'Tidak',
                        ]),
                Select::make('kebutuhan_khusus')
                    -> required()
                    -> label('Kebutuhan Khusus')
                    -> placeholder('Silahkan pilih...')
                        ->options([
                            'ya' => 'Ya',
                            'tidak' => 'Tidak',
                        ]),
                Textarea::make('alamat_rumah')
                    -> required()
                    -> label('Alamat Rumah'),
                Select::make('status_tempat_tinggal')
                    -> label('Status Tempat Tinggal')
                    -> placeholder('Silahkan pilih')
                        ->options([
                            'sewa' => 'Sewa',
                            'miliksendiri' => 'Milik Sendiri',
                            'orangtua' => 'Orang Tua',
                        ]),
                Select::make('jarak_tempat_tinggal')
                    -> required()
                    -> label('Jarak Tempat Tinggal')
                    -> placeholder('Silahkan pilih')
                            ->options([
                                '1' => '0-5 Km',
                                '2' => '5-10 Km',
                                '3' => '10-15 Km',
                                '4' => '15-20 Km',
                                '5' => '20-25 Km',
                                '6' => '25-30 Km',
                                '7' => '30-35 Km',
                                '8' => '35-40 Km',
                                '9' => '40-45 Km',
                                '10' => '45-50 Km',
                            ]),
                Select::make('waktu_tempuh')
                    -> required()
                    -> label('Waktu Tempuh')
                    -> placeholder('Silahkan pilih')
                                ->options([
                                    '1' => '0-30 Menit',
                                    '2' => '30-60 Menit',
                                    '3' => '60-90 Menit',
                                    '4' => '90-120 Menit',
                                    '5' => '120-150 Menit',
                                    '6' => '150-180 Menit',
                                    '7' => '180-210 Menit',
                                    '8' => '210-240 Menit',
                                    '9' => '240-270 Menit',
                                    '10' => '270-300 Menit',
                                ]),
                Select::make('transportasi_ke_sekolah')
                    -> required()
                    -> label('Transportasi ke Sekolah')
                    -> placeholder('Silahkan pilih...')
                                ->options([
                                    '1' => 'Umum',
                                    '2' => 'Sepeda',
                                    '3' => 'Sepeda Motor',
                                    '4' => 'Mobil',
                                ]),
            TextInput::make('asal_sekolah')
                -> required()
                -> label('Asal Sekolah/Madrasah')
                -> placeholder('Silahkan masukkan asal sekolah / madrasah...'),

            Section::make('Nilai Raport Terakhir')
            ->schema([

            Section::make('Nilai Kelas 4 Semester 1')
                    ->description('Silahkan masukkan Total Nilai dan Nilai Rata-rata serta Upload Bukti Raport')
                    ->schema([
                        TextInput::make('total_nilai_kelas_4_semester_1')
                        -> required()
                        -> label('Total Nilai')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Total Nilai...'),
                        TextInput::make('rata_rata_nilai_kelas_4_semester_1')
                        -> required()
                        -> label('Rata-rata')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Nilai Rata-rata...'),
                        
                        FileUpload::make('bukti_kelas_4_semester_1')
                        -> required()
                        -> label('Upload Bukti (JPG/PDF)')
                        -> placeholder('Silahkan unggah disini...'),
                    ])
                    ->columns(3),
                    

            Section::make('Nilai Kelas 4 Semester 2')
                    ->description('Silahkan masukkan Total Nilai dan Nilai Rata-rata serta Upload Bukti Raport')
                    ->schema([
                        TextInput::make('total_nilai_kelas_4_semester_2')
                        -> required()
                        -> label('Total Nilai')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Total Nilai...'),
                        TextInput::make('rata_rata_nilai_kelas_4_semester_2')
                        -> required()
                        -> label('Rata-rata')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Nilai Rata-rata...'),
                        FileUpload::make('bukti_kelas_4_semester_2')
                        -> required()
                        -> label('Upload Bukti (JPG/PDF)')
                        -> placeholder('Silahkan unggah disini...')
                    ])
                    ->columns(3),

            Section::make('Nilai Kelas 5 Semester 1')
                    ->description('Silahkan masukkan Total Nilai dan Nilai Rata-rata serta Upload Bukti Raport')
                    ->schema([
                        TextInput::make('total_nilai_kelas_5_semester_1')
                        -> required()
                        -> label('Total Nilai')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Total Nilai...'),
                        TextInput::make('rata_rata_nilai_kelas_5_semester_1')
                        -> required()
                        -> label('Rata-rata')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Nilai Rata-rata...'),
                        FileUpload::make('bukti_kelas_5_semester_1')
                -> required()
                -> label('Upload Bukti (JPG/PDF)')
                -> placeholder('Silahkan unggah disini...')
                    ])
                    ->columns(3),
            
            
            Section::make('Nilai Kelas 5 Semester 2')
                    ->description('Silahkan masukkan Total Nilai dan Nilai Rata-rata serta Upload Bukti Raport')
                    ->schema([
                        TextInput::make('total_nilai_kelas_5_semester_2')
                        -> required()
                        -> label('Total Nilai')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Total Nilai...'),
                        TextInput::make('rata_rata_nilai_kelas_5_semester_2')
                        -> required()
                        -> label('Rata-rata')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Nilai Rata-rata...'),
                        FileUpload::make('bukti_kelas_5_semester_2')
                -> required()
                -> label('Upload Bukti (JPG/PDF)')
                -> placeholder('Silahkan unggah disini...')
                    ])
                    ->columns(3),

            Section::make('Nilai Kelas 6 Semester 1')
                    ->description('Silahkan masukkan Total Nilai dan Nilai Rata-rata serta Upload Bukti Raport')
                    ->schema([
                        TextInput::make('total_nilai_kelas_6_semester_1')
                        -> required()
                        -> label('Total Nilai')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Total Nilai...'),
                        TextInput::make('rata_rata_nilai_kelas_6_semester_1')
                        -> required()
                        -> label('Rata-rata')
                        -> numeric()
                        -> placeholder('Silahkan masukkan Nilai Rata-rata...'),
                        FileUpload::make('bukti_kelas_6_semester_1')
                -> required()
                -> label('Upload Bukti (JPG/PDF)')
                -> placeholder('Silahkan unggah disini...')
                    ])
                    ->columns(3),
                    ]),
                Section::make('Prestasi Non Akademis')
                ->schema([
                    TextInput::make('jenis_lomba_satu')
                    
                    -> label('Jenis Lomba')
                    -> placeholder('Silahkan masukkan jenis lomba yg pernah diikuti...'),
                    TextInput::make('prestasi_satu')
                    
                    -> label('Prestasi')
                    -> placeholder('Silahkan masukkan prestasi yg pernah dicapai...'),
                    Select::make('tingkat_prestasi_satu')
                    
                    -> label('Tingkat')
                    -> placeholder('Silahkan pilih...')
                                ->options([
                                    '1' => 'Kecamatan',
                                    '2' => 'Kebupaten',
                                    '3' => 'Provinsi',
                                    '4' => 'Nasional',
                                ]),
                    
                                TextInput::make('jenis_lomba_dua')
                                
                                -> label('Jenis Lomba')
                                -> placeholder('Silahkan masukkan jenis lomba yg pernah diikuti...'),
                                TextInput::make('prestasi_dua')
                                
                                -> label('Prestasi')
                                -> placeholder('Silahkan masukkan prestasi yg pernah dicapai...'),
                                Select::make('tingkat_prestasi_dua')
                                
                                -> label('Tingkat')
                                -> placeholder('Silahkan pilih...')
                                            ->options([
                                                '1' => 'Kecamatan',
                                                '2' => 'Kebupaten',
                                                '3' => 'Provinsi',
                                                '4' => 'Nasional',
                                            ]),
                                            TextInput::make('jenis_lomba_tiga')
                                            
                                            -> label('Jenis Lomba')
                                            -> placeholder('Silahkan masukkan jenis lomba yg pernah diikuti...'),
                                            TextInput::make('prestasi_tiga')
                                            
                                            -> label('Prestasi')
                                            -> placeholder('Silahkan masukkan prestasi yg pernah dicapai...'),
                                            Select::make('tingkat_prestasi_tiga')
                                            
                                            -> label('Tingkat')
                                            -> placeholder('Silahkan pilih...')
                                                        ->options([
                                                            '1' => 'Kecamatan',
                                                            '2' => 'Kebupaten',
                                                            '3' => 'Provinsi',
                                                            '4' => 'Nasional',
                                                        ]),
                ])->columns(3)
                
        
            ]);
            
    }
    public static function beforeCreate(array &$data)
    {
        $userId = auth()->id();
        if (Pendaftaran::where('user_id', $userId)->exists()) {
            throw ValidationException::withMessages([
                'user_id' => 'Anda hanya dapat mengisi data pendaftaran satu kali.',
            ]);
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('pasphoto')-> label('Photo'),
                TextColumn::make('nama_lengkap')-> label('Nama Lengkap')-> searchable(),
                TextColumn::make('nik')-> label('NIK')-> searchable(),
                TextColumn::make('nisn')-> label('NISN'),
                TextColumn::make('kip')-> label('KIP'),
                TextColumn::make('jenis_kelamin')-> label('Jenis Kelamin'),
                
                    BooleanColumn::make('is_lulus') // Menampilkan kolom is_lulus
                        ->label('Status')             // Label untuk kolom
                        ->sortable()                 // Membuat kolom bisa disortir
                        ->toggleable(),              // Membuat kolom toggleable
                    

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                // Menambahkan aksi Download PDF
        Action::make('download_pdf')
        ->label('Bukti Daftar')
        ->icon('heroicon-o-arrow-down') // Atau bisa menggunakan icon lain jika perlu
        ->action(function ($record) {
            // Membuat PDF menggunakan DomPDF
            $pdf = new Dompdf();
            $pdf->loadHtml(view('pdf_template', ['record' => $record])->render());
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();

            // Output file PDF
            return response()->stream(
                function () use ($pdf) {
                    echo $pdf->output();
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="buktidaftar.pdf"',
                ]
            );
        }),
        // Aksi Download Kartu
    Action::make('download_kartu')
    ->label('Kartu Tes')
    ->icon('heroicon-o-arrow-down') // Atau bisa menggunakan icon lain jika perlu
    ->action(function ($record) {
        // Membuat PDF menggunakan DomPDF
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf_template_kartu', ['record' => $record])->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        // Output file PDF
        return response()->streamDownload(
            fn() => print($pdf->output()),
            'kartu.pdf',
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment',
            ]
        );
    }),
    
// Aksi Download Formulir
Action::make('download_formulir')
    ->label('Formulir')
    ->icon('heroicon-o-arrow-down') // Atau bisa menggunakan icon lain jika perlu
    ->visible(function ($record) {
        // Menampilkan tombol hanya jika sudah ada izin dan status lulus
        return $record && $record->is_lulus && $record->can_download_formulir;
    })
    ->action(function ($record) {
        
        // Pastikan toggle 'can_download_formulir' sudah diaktifkan dan status 'is_lulus' benar
        if (!$record->can_download_formulir || !$record->is_lulus) {
            return response()->json(['error' => 'Anda tidak diizinkan untuk mengunduh formulir.'], 403);
        }

        // Membuat PDF menggunakan DomPDF
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf_template_formulir', ['record' => $record])->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Mengirimkan file PDF sebagai response download
        return response()->streamDownload(
            fn() => print($pdf->output()),
            'formulir.pdf',
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="formulir.pdf"',
            ]
        );
    }),
    



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
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }    
    public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    // Cek apakah pengguna adalah super_admin atau bukan
    if (!auth()->user()->hasRole(['super_admin', 'Administrator'])) {
        $query->where('user_id', auth()->id()); // Hanya pendaftaran milik pengguna yang ditampilkan
    }

    return $query;
}


//     public static function query(\Illuminate\Database\Eloquent\Builder $query)
// {
//     return $query->where('user_id', auth()->id());
// }

}
