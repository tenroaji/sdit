<?php

namespace App\Filament\Resources\PenentuanKenaikanResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Santri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KenaikanTingkatSantri;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class KenaikantingkatsRelationManager extends RelationManager
{
    protected static string $relationship = 'kenaikantingkats';
    protected static ?string $modelLabel = 'Kenaikan Kelas Santri';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun'),
                Forms\Components\Select::make('santri_id')
                    ->relationship('santri', 'nama'),
                Forms\Components\TextInput::make('tingkat_lama'),
                Forms\Components\TextInput::make('tingkat_baru'),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('penentuankenaikan_id')
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun Ajaran'),
                Tables\Columns\TextColumn::make('santri.nis')
                    ->label('NIS'),
                Tables\Columns\TextColumn::make('santri.nama')
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('tingkat_lama')
                    ->label('Kelas Sebelumnya'),
                Tables\Columns\TextColumn::make('tingkat_baru')
                    ->label('Kelas Sekarang'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                //Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('naik')
                    ->label('Naik Kelas')
                    ->action(function (KenaikanTingkatSantri $record) {
                        // dump($record);
                        $record->tingkat_baru = $record->tingkat_baru + 1;
                        $record->save();
                        // Find the Santri model
                        $santri = Santri::find($record->santri_id);

                        // Check if the Santri is found
                        if ($santri) {
                            // Update the tingkat_id
                            $santri->tingkat_id = $record->tingkat_baru;

                            // Save the Santri model
                            $santri->save();
                        }
                    }),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                //Tables\Actions\CreateAction::make(),
            ]);
    }
}
