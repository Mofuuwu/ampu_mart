<?php
namespace App\Filament\Resources\DepositeResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\DepositeResource;
use App\Models\User;

class EditDeposite extends EditRecord
{
    protected static string $resource = DepositeResource::class; // Pastikan pakai Resource, bukan Model
    protected static string $view = 'filament.deposite';
    protected static ?string $title = 'Tambah Saldo User';
    // Tidak perlu `mount()`, karena Filament otomatis mengambil User berdasarkan ID
}

