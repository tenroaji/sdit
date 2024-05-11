<?php

namespace App\Filament\Resources\MasterAbsensiResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
class AbsensisRelationManager extends RelationManager
{
    protected static string $relationship = 'absensis';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                    ->relationship('santri','nama'),
                    Forms\Components\Toggle::make('status_hadir'),
                    Forms\Components\TextInput::make('user_id')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('masterabsensi_id')
            ->columns([
                Tables\Columns\ToggleColumn::make('status_hadir')
                    ->afterStateUpdated(function ($record, $state) {
                        $record->status = $state ? 'HADIR' : 'ALPA';
                        $record->save();
                    }),
                Tables\Columns\SelectColumn::make('status')
                    ->label('Keterangan')
                    ->default('ALPA')
                    ->options([
                        'HADIR' => 'HADIR',
                        'ALPA' => 'ALPA',
                        'SAKIT' => 'SAKIT',
                        'IZIN' => 'IZIN',
                    ])
                    ->selectablePlaceholder(false),
                Tables\Columns\TextColumn::make('santri.nama'),

                Tables\Columns\TextColumn::make('santri.nis')->label('NISN'),
//                Tables\Columns\TextColumn::make('user.name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
