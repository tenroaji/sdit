<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SantriGaleriResource\Pages;
use App\Filament\Resources\SantriGaleriResource\RelationManagers;
use App\Models\SantriGaleri;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms;
use Filament\Infolists\Components\Grid;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class SantriGaleriResource extends Resource
{
    protected static ?string $model = SantriGaleri::class;
    protected static ?string $pluralModelLabel = 'Galeri Santri';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                ->relationship('santri','nama')
                ->preload()
                ->label('Nama Santri')
                ->searchable(),
                Forms\Components\FileUpload::make('media')
                ->disk('public_images')
                ->preserveFilenames(),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                    Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas','nama')
                    ->preload()
                    ->label('Nama Kelas')
                    ->searchable(),
                    Forms\Components\Select::make('user_id')
                    ->relationship('user','name')
                    ->label('Diinput Oleh')
                    ->default(Auth()->id())
                    ->disabled(),
                Forms\Components\DatePicker::make('tanggal'),
            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
        // ->modifyQueryUsing(fn (Builder $query) => $query->where("kelas_id","1"))
            ->columns([
                Tables\Columns\TextColumn::make('santri.nama')
                    ->numeric()
                    ->sortable(),
              Tables\Columns\ImageColumn::make('media')
                // ->width(100)
                ->height(100)
                ->disk('public_images'),

                Tables\Columns\TextColumn::make('kelas.nama')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
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
                // Tables\Actions\ViewAction::make()
                // ->label('Lihat Galeri'),
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


    // public static function infolist(Infolist $infolist): Infolist
    // {
    //     return $infolist
    //         ->schema([
    //             Section::make('Galeri')
    //                 ->collapsible()
    //                 ->collapsed()
    //                 ->schema([
    //                     RepeatableEntry::make('santri')
    //                         ->schema([
    //                             Infolists\Components\ImageEntry::make('media')
    //                             ->width(100)
    //                             ->height(150)
    //                             ->hiddenLabel()
    //                             ->grow(false)
    //                             ->disk('public_images'),

    //                         ])->columns(1),
    //                 ]),
    //         ]);
    // }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSantriGaleris::route('/'),
            'create' => Pages\CreateSantriGaleri::route('/create'),
            'view' => Pages\ViewSantriGaleri::route('/{record}'),
            'edit' => Pages\EditSantriGaleri::route('/{record}/edit'),
        ];
    }
}
