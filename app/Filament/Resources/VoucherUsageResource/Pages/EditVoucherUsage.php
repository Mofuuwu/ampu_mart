<?php

namespace App\Filament\Resources\VoucherUsageResource\Pages;

use App\Filament\Resources\VoucherUsageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVoucherUsage extends EditRecord
{
    protected static string $resource = VoucherUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
