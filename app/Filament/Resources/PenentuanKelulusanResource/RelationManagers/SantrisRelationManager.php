<?php

namespace App\Filament\Resources\PenentuanKelulusanResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Santri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KelulusanSantri;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SantrisRelationManager extends RelationManager
{
    protected static string $relationship = 'santris';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                    ->relationship('santri','nama')
                    ->preload()
                    ->searchable()
                    ->label('Santri'),
                Forms\Components\Select::make('strata_lama')
                    ->relationship('stratalama','nama')
                    ->preload()
                    ->searchable()
                    ->label('Jenjang Lama'),  
                Forms\Components\Select::make('strata_baru')
                    ->relationship('stratabaru','nama')
                    ->preload()
                    ->searchable()
                    ->label('Jenjang Baru'),
                Forms\Components\TextInput::make('predikat'),
                Forms\Components\Select::make('user_id')              
                ->relationship('user','name')
                ->default(Auth()->id())
                ->disabled()
                ->label('Diinput Oleh'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('kelulusan_id')
            ->columns([
                Tables\Columns\TextColumn::make('santri.nama'),
                Tables\Columns\TextInputColumn::make('predikat'),
                Tables\Columns\TextColumn::make('stratalama.nama'),
                Tables\Columns\TextColumn::make('stratabaru.nama'),
                
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('luluk')
                    ->label('Lulus')
                    ->action(function (KelulusanSantri $record) {
                        // dump($record);
                        $record->strata_baru = $record->strata_baru + 1;
                        $record->save();
                        // Find the Santri model
                        $santri = Santri::find($record->santri_id);

                        // Check if the Santri is found
                        if ($santri) {
                            // Update the tingkat_id
                            $santri->strata_id = $record->strata_baru;
                            $santri->tingkat_id = $santri->tingkat_id + 1;

                            if ($santri->tingkat_id > 12) {
                                $santri->status_aktif = 0;
                            }
                        

                            // Save the Santri model
                            $santri->save();
                        }
                    }),
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
}
