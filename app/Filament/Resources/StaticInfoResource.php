<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StaticInfo;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StaticInfoResource\Pages;
use App\Filament\Resources\StaticInfoResource\RelationManagers;

class StaticInfoResource extends Resource
{
    protected static ?string $model = StaticInfo::class;

    protected static ?string $navigationIcon = 'heroicon-s-megaphone';
    protected static ?string $modelLabel = 'Informasi Statis';
    protected static ?string $navigationLabel = 'Informasi Statis';
    protected static ?string $navigationGroup = 'Jurnalistik';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('infostatic')
                    ->tabs([
                        Tabs\Tab::make('Tentang Pesantren')
                            ->schema([
                                Forms\Components\RichEditor::make('visi')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('misi')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('sejarah')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('tentang')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('struktur_organisasi')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Aturan')
                            ->schema([
                                Forms\Components\RichEditor::make('aturan_daftar')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('aturan_pondok')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('foto1')
                                    ->disk('public_images')
                                    ->preserveFilenames(),
                                Forms\Components\FileUpload::make('foto2')
                                    ->disk('public_images')
                                    ->preserveFilenames(),
                            ]),
                        Tabs\Tab::make('Teams')
                            ->schema([

                                Forms\Components\TextInput::make('pimpinan1')
                                    ->label('nama'),
                                Forms\Components\TextInput::make('jab1')
                                    ->label('Sebagai'),
                                Forms\Components\FileUpload::make('fotopimpinan1')
                                ->label('Foto')
                                    ->disk('public_images')
                                    ->preserveFilenames(),
                                Forms\Components\TextInput::make('pimpinan2')
                                    ->label('nama'),
                                Forms\Components\TextInput::make('jab2')
                                ->label('Sebagai'),
                                Forms\Components\FileUpload::make('fotopimpinan2')
                                ->label('Foto')
                                    ->disk('public_images')
                                    ->preserveFilenames(),
                                    Forms\Components\TextInput::make('pimpinan3')
                                        ->label('Nama'),
                                Forms\Components\TextInput::make('jab3')
                                ->label('Sebagai'),
                                Forms\Components\FileUpload::make('fotopimpinan3')
                                ->label('Foto')
                                    ->disk('public_images')
                                    ->preserveFilenames(),
                                Forms\Components\TextInput::make('pimpinan4')
                                    ->label('Nama'),
                                Forms\Components\TextInput::make('jab4')
                                ->label('Sebagai'),
                                Forms\Components\FileUpload::make('fotopimpinan4')
                                ->label('Foto')
                                    ->disk('public_images')
                                    ->preserveFilenames(),
                            ]),
                        Tabs\Tab::make('View')
                            ->schema([
                                Forms\Components\FileUpload::make('banner1')
                                ->disk('public_images')
                                ->preserveFilenames(),
                                Forms\Components\FileUpload::make('banner2')
                                ->disk('public_images')
                                ->preserveFilenames(),
                                Forms\Components\FileUpload::make('banner3')
                    
                                ->disk('public_images')
                                ->preserveFilenames(),
                                Forms\Components\FileUpload::make('banner4')
                                ->disk('public_images')
                                ->preserveFilenames(),
                                Forms\Components\RichEditor::make('tawar1')
                                    ->label('Tawar 1'),
                                Forms\Components\RichEditor::make('tawar2')
                                    ->label('Tawar 2'),
                                Forms\Components\RichEditor::make('tawar3')
                                    ->label('Tawar 3'),

                                Forms\Components\TextInput::make('lat')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('long')
                                    ->maxLength(255),
                            ])
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('long')
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStaticInfos::route('/'),
            'create' => Pages\CreateStaticInfo::route('/create'),
            'edit' => Pages\EditStaticInfo::route('/{record}/edit'),
        ];
    }
}
