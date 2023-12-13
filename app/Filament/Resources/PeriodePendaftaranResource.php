<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodePendaftaranResource\Pages;
use App\Filament\Resources\PeriodePendaftaranResource\RelationManagers;
use App\Filament\Resources\PeriodePendaftaranResource\RelationManagers\CalonsRelationManager;
use App\Models\PeriodePendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodePendaftaranResource extends Resource
{
    protected static ?string $model = PeriodePendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-plus';
    protected static ?string $modelLabel = 'Pendaftaran santri Baru';
    protected static ?string $navigationLabel = 'Pendaftaran Santri Baru';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('strata_id')
                    ->preload()
                    ->searchable()
                    ->relationship('strata','nama')
                    ->label('Jenjang')
                   ,  
                   Forms\Components\DatePicker::make('mulai'),
                   Forms\Components\DatePicker::make('sampai'),    
                Forms\Components\TextInput::make('biaya')
                    ->label('Biaya Pendaftaran')
                    ->required()
                    ->prefix('Rp')
                    ->numeric(),
                Forms\Components\Textarea::make('deskripsi')
                    ->default('Penerimaan Santri Baru')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('biaya')
                    ->label('Biaya Pendaftaran')
                    ->prefix('Rp. ')
                    ->money('idr')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('strata.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mulai')
                    ->date(),   
                Tables\Columns\TextColumn::make('sampai')
                    ->date(),      
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
           CalonsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeriodePendaftarans::route('/'),
            'create' => Pages\CreatePeriodePendaftaran::route('/create'),
            'edit' => Pages\EditPeriodePendaftaran::route('/{record}/edit'),
        ];
    }    
}
