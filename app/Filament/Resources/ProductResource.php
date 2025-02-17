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
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                TextColumn::make('category.name')
                ->label('Kategori'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
