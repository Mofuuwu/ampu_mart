<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $label = "Produk";
    protected static ?string $navigationLabel = "Produk";
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-s-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image_url')
                ->label('Gambar Produk')
                ->required()
                ->directory('images/products')
                ->image()
                ->columnSpan(2),
                TextInput::make('name')
                ->label('Nama Produk')
                ->columnSpan(2)
                ->required(),
                Textarea::make('description')
                ->label('Deskripsi')
                ->placeholder('Opsional')
                ->columnSpan(2)
                ->required(),
                TextInput::make('price')
                ->label('Harga')
                ->placeholder('Ex : 12000 ( Jangan gunakan titik atau koma )')
                ->numeric()
                ->required(),
                TextInput::make('stock')
                ->label('Stok')
                ->numeric()
                ->required(),
                Select::make('category_id')
                ->options(Category::all()->pluck('name', 'id'))
                ->label('Kategori')
                ->required()
                ->columnSpan(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ImageColumn::make('image_url')
                // ->label('Gambar'),
                TextColumn::make('name')
                ->label('Nama'),
                TextColumn::make('price')
                ->label('Harga'),
                TextColumn::make('stock')
                ->label('Stok'),
                BadgeColumn::make('order_items_sum_amount')
                ->label('Terjual')
                ->getStateUsing(fn($record) => $record->order_items()->sum('amount'))
                ->colors([
                    'gray' => fn($state) => $state == 0,
                    'success' => fn($state) => $state > 0,
                ]),
                TextColumn::make('category.name')
                ->label('Kategori'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            // 'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
