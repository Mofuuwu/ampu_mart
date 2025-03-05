<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $label = "User";
    protected static ?string $navigationLabel = "User";
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                TextInput::make('password')
                    ->label('password')
                    ->password()
                    ->required()
                    ->visibleOn('create'),

                TextInput::make('phone_number')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->required()
                    ->maxLength(15),

                Select::make('role')
                    ->label('Role')
                    ->options([
                        1 => 'Admin',
                        2 => 'User',
                    ])
                    ->required(),

                TextInput::make('balance')
                    ->label('Saldo')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->required()
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.')) // Format angka
                    ->disabledOn('edit'),
                DateTimePicker::make('created_at')
                    ->label('Dibuat Pada')
                    ->disabled()
                    ->hiddenOn('create')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
