<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyusunanRosterResource\Pages;
use App\Filament\Resources\PenyusunanRosterResource\RelationManagers;
use App\Filament\Resources\PenyusunanRosterResource\RelationManagers\RostersRelationManager;
use App\Models\PenyusunanRoster;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PenyusunanRosterResource extends Resource
{
    protected static ?string $model = PenyusunanRoster::class;

    protected static ?string $navigationIcon = 'heroicon-s-calendar-days';
    protected static ?string $modelLabel = 'Penyusunan Jadwal Belajar Mengajar';
    protected static ?string $navigationLabel = 'Penyusunan Jadwal Belajar Mengajar';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->label('Tahun Ajaran')
                    ->maxLength(4),
                Forms\Components\TextInput::make('semester')
                    ->numeric()
                    ->label('Semester'),
                Forms\Components\Select::make('kelas_id')
                ->searchable()
                ->preload()
                    ->label('Ruang Kelas')
                    ->relationship('kelas','nama'),
                Forms\Components\Select::make('user_id')
                    ->label('Diinput Oleh')
                    ->default(Auth()->id())
                    ->relationship('user','name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('semester')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kelas.nama')
                    ->label('Ruang Kelas')
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
           RostersRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenyusunanRosters::route('/'),
            'create' => Pages\CreatePenyusunanRoster::route('/create'),
            'edit' => Pages\EditPenyusunanRoster::route('/{record}/edit'),
        ];
    }    
}
