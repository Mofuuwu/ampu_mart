<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoucherResource\Pages;
use App\Filament\Resources\VoucherResource\RelationManagers;
use App\Models\Voucher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Illuminate\Validation\Rule;

class VoucherResource extends Resource
{
    protected static ?string $model = Voucher::class;
    protected static ?string $label = "Voucher";
    protected static ?string $navigationLabel = "Voucher";
    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                    ->label('Kode Voucher')
                    ->rules(fn ($record) => [
                        $record
                            ? Rule::unique('vouchers', 'code')->ignore($record->id) // Abaikan kode yang sedang diedit
                            : Rule::unique('vouchers', 'code')
                    ])
                    ->validationMessages([
                        'unique' => 'Kode voucher ini telah ada, silakan gunakan kode lain.',
                    ])
                    ->required()
                    ->maxLength(255),

                Select::make('type')
                    ->label('Tipe')
                    ->options([
                        'fixed' => 'Fixed Amount',
                        'percentage' => 'Percentage',
                    ])
                    ->required(),

                TextInput::make('value')
                    ->label('Nilai')
                    ->helperText('jika tipe fixed, masukkan jumlah rupiah (ex : 10.000), jika tipe percentage misal ingin memasukkan 2%, cukup masukkan angka 2')
                    ->numeric()
                    ->minValue(1)
                    ->required()
                    ->columnSpan(2),
                TextInput::make('amount')
                    ->label('Jumlah Voucher')
                    ->numeric()
                    ->minValue(1)
                    ->required()
                    ->live(debounce: 500)
                    ->disabledOn('edit')
                    ->afterStateUpdated(fn($state, callable $set) => $set('remaining', $state)),

                TextInput::make('remaining')
                    ->label('Sisa Kuota')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(),

                DatePicker::make('valid_from')
                    ->label('Berlaku Dari')
                    ->required(),

                DatePicker::make('valid_until')
                    ->label('Berlaku Sampai')
                    ->required(),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Kode Voucher')
                    ->searchable(),

                TextColumn::make('type')
                    ->label('Tipe')
                    ->formatStateUsing(fn($state) => $state === 'fixed' ? 'Fixed Amount' : 'Percentage'),

                TextColumn::make('value')
                    ->label('Nilai')
                    ->formatStateUsing(
                        fn($state, $record) =>
                        $record->type === 'percentage' ? $state . '%' : 'Rp ' . number_format($state, 2, ',', '.')
                    ),

                    BadgeColumn::make('valid')
                    ->label('Status')
                    ->getStateUsing(fn($record) => 
                        $record->remaining == 0 
                            ? 'Habis' 
                            : (now()->between($record->valid_from, $record->valid_until) ? 'Valid' : 'Tidak Valid')
                    )
                    ->color(fn($state) => 
                        $state === 'Valid' ? 'success' : ($state === 'Habis' ? 'warning' : 'danger')
                    ),
                
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListVouchers::route('/'),
        ];
    }
}
