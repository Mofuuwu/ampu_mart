<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;
    protected static ?string $label = "Alamat";
    protected static ?string $navigationLabel = "Alamat";
    protected static ?int $navigationSort = 7;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->label('Nama Alamat')
                ->required()
                ->maxLength(255),
            TextInput::make('phone_number')
                ->label('Nomor Telepon')
                ->tel()
                ->required()
                ->maxLength(20),

            Textarea::make('address')
                ->label('Alamat')
                ->required()
                ->columnSpan(2)
                ->maxLength(255),

            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            
            TextColumn::make('user.name')
                ->label('Nama Pengguna')
                ->sortable(),
            TextColumn::make('name')
                ->label('Nama Alamat')
                ->searchable(),

        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAddresses::route('/'),
        ];
    }
}
