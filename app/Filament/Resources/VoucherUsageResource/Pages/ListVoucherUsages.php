<?php

namespace App\Filament\Resources\VoucherUsageResource\Pages;

use App\Filament\Resources\VoucherUsageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVoucherUsages extends ListRecords
{
    protected static string $resource = VoucherUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
