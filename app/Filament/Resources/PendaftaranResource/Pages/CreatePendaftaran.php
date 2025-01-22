<?php

namespace App\Filament\Resources\PendaftaranResource\Pages;

use App\Filament\Resources\PendaftaranResource;
use App\Models\Pendaftaran;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;



class CreatePendaftaran extends CreateRecord
{
    protected static string $resource = PendaftaranResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login
        $existingPendaftaran = Pendaftaran::where('user_id', $userId)->exists();


        if ($existingPendaftaran) {
            throw ValidationException::withMessages([
                'user_id' => __('Anda sudah terdaftar. Pendaftaran hanya dapat dilakukan sekali.'),
            ]);
        }

        $data['user_id'] = $userId; // Menambahkan user_id secara otomatis
        return $data;
    }
}

