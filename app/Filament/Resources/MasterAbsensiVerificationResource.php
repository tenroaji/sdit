<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterAbsensiVerificationResource\Pages;
use App\Filament\Resources\MasterAbsensiVerificationResource\RelationManagers;
use App\Models\MasterAbsensiVerification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ToggleColumn;

class MasterAbsensiVerificationResource extends Resource
{
    protected static ?string $model = MasterAbsensiVerification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal'),
                Forms\Components\TextInput::make('jam_id')
                    ->numeric(),
                Forms\Components\TextInput::make('matapelajaran_id')
                    ->numeric(),
                Forms\Components\TextInput::make('guru_id')
                    ->numeric(),
                Forms\Components\TextInput::make('kelas_id')
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->numeric(),
                Forms\Components\TextInput::make('mulai_jam')
                    ->required(),
                Forms\Components\TextInput::make('hingga_jam')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ToggleColumn::make('status_verifikasi'),
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()

                    ->sortable(),
                Tables\Columns\TextColumn::make('jam.nama')
                    ->label('Jam Pelajaran'),
                    Tables\Columns\TextColumn::make('mulai_jam')
                    ->time()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('hingga_jam')
                    ->time()
                    ->sortable(),
                Tables\Columns\TextColumn::make('matapelajaran.nama')

                    ->sortable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelas.nama')
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
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListMasterAbsensiVerifications::route('/'),
            'create' => Pages\CreateMasterAbsensiVerification::route('/create'),
            'edit' => Pages\EditMasterAbsensiVerification::route('/{record}/edit'),
        ];
    }
}
