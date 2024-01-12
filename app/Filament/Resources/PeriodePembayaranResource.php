<?php

namespace App\Filament\Resources;

use Akaunting\Money\Currency;
use Akaunting\Money\View\Components\Money;
use Filament\Forms;
use TextInput\Mask;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use App\Models\PeriodePembayaran;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeriodePembayaranResource\Pages;
use App\Filament\Resources\PeriodePembayaranResource\RelationManagers;
use App\Filament\Resources\PeriodePembayaranResource\RelationManagers\PembayaransRelationManager;

class PeriodePembayaranResource extends Resource
{
    protected static ?string $model = PeriodePembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-s-banknotes';
    protected static ?string $modelLabel = 'Dana Wakaf';
    protected static ?string $navigationLabel = 'Dana Wakaf Bulanan (DWB)';
    protected static ?string $navigationGroup = 'Keuangan Akademik';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bulan')
                    ->required()
                    ->maxLength(255),
                // Forms\Components\TextInput::make('tahun')
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\Select::make('tahun')
                    // ->required()
                    ->preload()
                    ->searchable()
                    ->relationship('tahun', 'nama'),
                Forms\Components\Select::make('tingkat_id')
                    // ->required()
                    ->preload()
                    ->searchable()
                    ->relationship('tingkat', 'nama'),
                Forms\Components\Select::make('strata_id')
                    // ->required()
                    ->preload()
                    ->searchable()
                    ->relationship('strata', 'nama'),
                Forms\Components\TextInput::make('jumlah_bayar')
                //     ->numeric()
                //   ->currencyMask(thousandSeparator: '.',decimalSeparator: ',',precision: 2)
                //     ->required()
                //     ->mask(RawJs::make(<<<'JS'
                //     $money($input, ',', '.', 2)
                // JS))
                ->prefix('Rp')
                    ,



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bulan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tingkat.nama')
                    ->label('Kelas')
                    ->searchable(),
                //  Tables\Columns\TextColumn::make('strata.nama')
                //     ->label('Jenjang')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PembayaransRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeriodePembayarans::route('/'),
            'create' => Pages\CreatePeriodePembayaran::route('/create'),
            'view' => Pages\ViewPeriodePembayaran::route('/{record}'),
            'edit' => Pages\EditPeriodePembayaran::route('/{record}/edit'),
        ];
    }
}
