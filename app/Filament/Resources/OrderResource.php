<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Get;
use Filament\Forms\Components\Section;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $label = "Pesanan";
    protected static ?string $navigationLabel = "Pesanan";
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-s-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('order_id')
                    ->label('Order ID')
                    ->disabled()
                    ->columnSpan(2)
                    ->required(),

                Select::make('user_id')
                    ->label('Pengguna')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->disabled()
                    ->preload()
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->disabled()
                    ->required(),

                Textarea::make('note')
                    ->label('Catatan')
                    ->nullable()
                    ->columnSpan(2)
                    ->formatStateUsing(fn($state) => $state ?? '-')
                    ->disabled(),

                Select::make('address_id')
                    ->label('Alamat')
                    ->relationship('address', 'address')
                    ->searchable()
                    ->disabled()
                    ->columnSpan(2)
                    ->preload()
                    ->required(),

                DateTimePicker::make('order_date')
                    ->label('Tanggal Order')
                    ->required()
                    ->columnSpan(2)
                    ->disabled(),

                Repeater::make('order_items') 
                    ->relationship('order_items') 
                    ->label('Daftar Produk Yang Dibeli')
                    ->columnSpan(2)
                    ->schema([
                        TextInput::make('product_name')
                            ->label('Nama Produk')
                            ->disabled(),

                        TextInput::make('product_price')
                            ->label('Harga Satuan')
                            ->numeric()
                            ->disabled(),

                        TextInput::make('amount')
                            ->label('Jumlah')
                            ->numeric()
                            ->disabled(),

                        TextInput::make('total_price')
                            ->label('Total Harga')
                            ->numeric()
                            ->disabled(),
                    ])
                    ->columns(4) 
                    ->disableItemCreation()
                    ->disableItemDeletion()
                    ->disableItemMovement(),
                    TextInput::make('price')
                    ->label('Harga Awal')
                    ->disabled()
                    ->required()
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.')),


                TextInput::make('shipping_cost')
                    ->label('Ongkos Kirim')
                    ->disabled()
                    ->formatStateUsing(fn(Get $get) => $get('delivery_method') === 'delivery' ? '20.000' : '0')
                    ->dehydrated(false), 
                    
                    TextInput::make('voucher_code')
                    ->label('Kode Voucher')
                    ->disabled()
                    ->dehydrated(false)
                    ->formatStateUsing(fn($state) => $state ?? '-'),                

                TextInput::make('voucher_discount')
                    ->label('Potongan Harga')
                    ->disabled()
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->dehydrated(false),

                TextInput::make('final_price')
                    ->label('Total Harga')
                    ->disabled()
                    ->required()
                    ->columnSpan(2)
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.')),

                Select::make('delivery_method')
                    ->label('Metode Pengiriman')
                    ->options([
                        'delivery' => 'Dikirimkan ke Lokasi',
                        'pickup' => 'Ambil ke Toko',
                    ])
                    ->disabled()
                    ->required(),

                Select::make('payment_option')
                    ->label('Opsi Pembayaran')
                    ->options([
                        'pay_on_site' => 'Bayar Di Tempat',
                        'use_balance' => 'Saldo Ampu Mart',
                    ])
                    ->disabled()
                    ->required(),
                    Select::make('status')
                    ->label('Status Pesanan')
                    ->options([
                        'diproses' => 'Diproses',
                        'dibatalkan' => 'Dibatalkan',
                        'selesai' => 'Selesai',
                    ])
                    ->required(),

                Select::make('billing')
                    ->label('Status Pembayaran')
                    ->options([
                        'dibayar' => 'Dibayar',
                        'belum dibayar' => 'Belum Dibayar',
                    ])
                    ->disabled(fn(Get $get) => $get('payment_option') === 'use_balance')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_id')
                    ->label('Order ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('final_price')
                    ->label('Total Harga')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('order_date')
                    ->label('Tanggal Order')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'danger' => 'dibatalkan',
                        'success' => 'selesai',
                        'warning' => 'diproses',
                    ])
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Update Pesanan'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListOrders::route('/'),
        ];
    }
}
