<?php

namespace App\Filament\Resources\DepositeResource\Pages;

use App\Filament\Resources\DepositeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeposite extends EditRecord
{
    protected static string $resource = DepositeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
