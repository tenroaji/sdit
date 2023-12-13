<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiAsramaResource\Pages;
use App\Filament\Resources\AbsensiAsramaResource\RelationManagers;
use App\Filament\Resources\AbsensiAsramaResource\RelationManagers\KehadiranRelationManager;
use App\Models\AbsensiAsrama;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbsensiAsramaResource extends Resource
{
    protected static ?string $model = AbsensiAsrama::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';
    protected static ?string $modelLabel = 'Absensi Asrama Santri';
    protected static ?string $navigationLabel = 'Absensi Asrama Santri';
    protected static ?string $navigationGroup = 'Manajemen Asrama';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asrama_id')
                    ->preload()
                    ->label('Asrama')
                    ->required()
                    ->relationship('asrama','nama')
                    ->searchable(),
                    Forms\Components\Select::make('kamarasrama_id')
                    ->preload()
                    ->label('Kamar')
                    ->required()
                    ->relationship('kamarasrama','nama')
                    ->searchable(),    
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\TextInput::make('tahun')
                    ->label('Tahun Masuk Asrama')
                    ->required()
                    ->maxWidth(4),    
                Forms\Components\Select::make('user_id')
                ->disabled()
                ->label('Diinput Oleh')
                ->relationship('user','name')
                ->default(Auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asrama.nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kamarasrama.nama')
                    ->searchable()
                    ->sortable(),    
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
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
            KehadiranRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbsensiAsramas::route('/'),
            'create' => Pages\CreateAbsensiAsrama::route('/create'),
            'edit' => Pages\EditAbsensiAsrama::route('/{record}/edit'),
        ];
    }    
}
