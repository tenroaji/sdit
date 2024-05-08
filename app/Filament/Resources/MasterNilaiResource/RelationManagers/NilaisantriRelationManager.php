<?php

namespace App\Filament\Resources\MasterNilaiResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NilaisantriRelationManager extends RelationManager
{
    protected static string $relationship = 'nilaisantri';
    protected static ?string $title = 'Nilai Santri';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                ->relationship(
                    name: 'santri',
                    titleAttribute: 'nama',
                    modifyQueryUsing: fn (Builder $query) => $query->where('kelas_id', $this->getOwnerRecord()->kelas_id),
                )

                    ->preload()
                    ->searchable()
                    ->label('Santri'),
                // Forms\Components\Select::make('jenisnilai_id')
                // ->relationship('jenisnilai','nama')
                // ->preload()
                // ->searchable()
                // ->label('Jenis Nilai'),
                Forms\Components\TextInput::make('nilai')
                    ->numeric(),
                Forms\Components\Select::make('user_id')
                    ->disabled()
                    ->relationship('user','name')
                    ->default(Auth()->id())
                    ->label('Diinput Oleh'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('masternilai_id')
            ->columns([
                Tables\Columns\TextColumn::make('santri.nama')
                ->label('Santri'),
                // Tables\Columns\TextColumn::make('jenisnilai.nama')
                // ->label('Jenis Nilai'),
                Tables\Columns\TextColumn::make('nilai')
                ->label('Nilai'),
                Tables\Columns\TextColumn::make('user.name')
                ->label('Diinput Oleh'),
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
