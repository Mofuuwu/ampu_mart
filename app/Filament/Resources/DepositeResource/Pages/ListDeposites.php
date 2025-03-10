<?php

namespace App\Filament\Resources\DepositeResource\Pages;

use App\Filament\Resources\DepositeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeposites extends ListRecords
{
    protected static string $resource = DepositeResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
