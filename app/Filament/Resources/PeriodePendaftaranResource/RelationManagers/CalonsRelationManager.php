<?php

namespace App\Filament\Resources\PeriodePendaftaranResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class CalonsRelationManager extends RelationManager
{
    protected static string $relationship = 'calons';

    protected static ?string $title = 'Calon Santri';
    protected static ?string $modelLabel = 'Calon Santri';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tahun')
                ->default(function (RelationManager $livewire) {
                    return $livewire->ownerRecord->tahun;
                })
                ->label('Tahun Ajaran')
                ,
                // Forms\Components\TextInput::make('periodependaftaran_id')
                //     ->required()
                //     ->maxLength(255),
                TextInput::make('nama'),
                // ->live()
                // ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
            TextInput::make('alamat'),
            Select::make('kota_id')
            ->relationship('kota','nama')
            ->preload()
            ->searchable(),
           Select::make('strata_id')
           ->relationship('strata', 'nama')
           ->disabled()
           ->default(function (RelationManager $livewire) {
               return optional($livewire->ownerRecord->strata)->id;
           }),
            Select::make('gender')
            ->searchable()
            ->preload()
                ->options([
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan'
                ]),
            TextInput::make('tempat_lahir'),
            DatePicker::make('tanggal_lahir')->date(),
            TextInput::make('email'),
            TextInput::make('no_telpon'),
            FileUpload::make('foto')->disk('public_images')
            ->preserveFilenames(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('periodependaftaran_id')
            ->columns([
                TextColumn::make('nama')
                ->searchable() ->sortable(),
                TextColumn::make('tahun')
                ->searchable() ->sortable(),
                // TextColumn::make('strata_id')
                // ->searchable() ->sortable(),
                TextColumn::make('gender'),
                TextColumn::make('email'),
                TextColumn::make('no_telpon')
                
                ->searchable() ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('Tambah Calon Santri'),
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
