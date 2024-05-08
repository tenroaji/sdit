<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pembayaran;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-s-banknotes';
    protected static ?string $modelLabel = 'Pembayaran';
    protected static ?string $navigationLabel = 'pembayaran2';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bulan'),
                Forms\Components\TextInput::make('tahun'),
                Forms\Components\TextInput::make('nomor_pembayaran')
                ->default(fn () => 'Payment-' .  \Illuminate\Support\Str::uuid()->toString()),
                Forms\Components\DatePicker::make('tanggal_bayar')
                    ->default(now())
                    ->required(),
                Forms\Components\Toggle::make('status_bayar'),

                Forms\Components\Select::make('santri_id')
                   ->relationship('santri','nama'),

                Forms\Components\Radio::make('metode_bayar')
                    ->options([
                        'cash' => 'Cash',
                        'transfer' => 'Transfer',
                        'cicil' => 'Cicil'
                    ])
                    ->inline(),
                    Forms\Components\TextInput::make('bank'),
                    Forms\Components\TextInput::make('nilai_bayar')
                    ->mask(RawJs::make(<<<'JS'
                    $money($input, ',', '.', 2)
                JS))
                ->Prefix('Rp'),
                    Forms\Components\TextInput::make('sisa_bayar')
                    ->mask(RawJs::make(<<<'JS'
                    $money($input, ',', '.', 2)
                JS))
                ->Prefix('Rp'),
                Forms\Components\Select::make('user_id')
                    ->label('Yang Menerima')
                    ->relationship('user','name')
                    ->disabled()
                    ->default(Auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_bayar')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('santri_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('metode_bayar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}
