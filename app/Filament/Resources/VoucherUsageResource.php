<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoucherUsageResource\Pages;
use App\Filament\Resources\VoucherUsageResource\RelationManagers;
use App\Models\VoucherUsage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class VoucherUsageResource extends Resource
{
    protected static ?string $model = VoucherUsage::class;
    protected static ?string $label = "Riwayat Voucher";
    protected static ?string $navigationLabel = "Riwayat Voucher";
    protected static ?int $navigationSort = 8;

    protected static ?string $navigationIcon = 'heroicon-s-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('voucher_code')
                    ->label('Kode Voucher')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('order_id')
                    ->label('ID Pesanan')
                    ->sortable(),

                TextColumn::make('usage_date')
                    ->label('Tanggal Penggunaan')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListVoucherUsages::route('/'),
            // 'create' => Pages\CreateVoucherUsage::route('/create'),
            // 'edit' => Pages\EditVoucherUsage::route('/{record}/edit'),
        ];
    }
}
