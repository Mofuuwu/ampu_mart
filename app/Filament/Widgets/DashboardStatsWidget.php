<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardStatsWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Order', Order::count())
                ->description('Semua pesanan yang telah dibuat')
                ->color('primary')
                ->icon('heroicon-o-shopping-bag'),

            Card::make('Pendapatan', 'Rp ' . number_format(Order::sum('final_price'), 0, ',', '.'))
                ->description('Total pendapatan dari semua pesanan')
                ->color('success')
                ->icon('heroicon-o-chart-bar'),

            Card::make('Produk Terlaris', Product::find(OrderItem::selectRaw('product_id, SUM(amount) as total_sold')
                ->groupBy('product_id')
                ->orderByDesc('total_sold')
                ->first()?->product_id)?->name ?? 'Belum Ada')
                ->description('Produk dengan penjualan tertinggi')
                ->color('warning')
                ->icon('heroicon-o-star'),

            Card::make('Total Pengguna', User::count())
                ->description('Jumlah pengguna yang telah mendaftar')
                ->color('info')
                ->icon('heroicon-o-user-group'),

            Card::make('Pesanan Belum Dibayar', Order::where('billing', 'belum dibayar')->count())
                ->description('Pesanan yang belum diselesaikan pembayarannya')
                ->color('danger')
                ->icon('heroicon-o-x-circle'),

            Card::make('Produk Habis Stok', Product::where('stock', 0)->count())
                ->description('Produk yang saat ini stoknya kosong')
                ->color('gray')
                ->icon('heroicon-o-archive-box-x-mark'),
        ];
    }

    protected function getColumns(): int
    {
        return 3; // Menampilkan 3 card per baris
    }
}
