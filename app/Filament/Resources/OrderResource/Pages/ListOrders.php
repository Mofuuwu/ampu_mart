<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
 
class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->label('Semua Pesanan')
                ->badge(Order::count()),
    
            'processed' => Tab::make()
                ->label('Sedang Diproses')
                ->badge(Order::where('status', 'diproses')->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'diproses')),
    
            'completed' => Tab::make()
                ->label('Selesai')
                ->badge(Order::where('status', 'selesai')->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'selesai')),
    
            'canceled' => Tab::make()
                ->label('Dibatalkan')
                ->badge(Order::where('status', 'dibatalkan')->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'dibatalkan')),
        ];
    }
    
}
