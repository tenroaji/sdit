<?php

namespace Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource\RelationManager;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Tables\Actions\BulkActionGroup;
use Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Spatie\Permission\PermissionRegistrar;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Resources\RelationManagers\RelationManager;

class PermissionRelationManager extends RelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $recordTitleAttribute = 'name';

    /*
     * Support changing tab title by translations in RelationManager.
     */
    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.permissions') ?? (string)str(static::getRelationshipName())
            ->kebab()
            ->replace('-', ' ')
            ->headline();
    }

    protected static function getModelLabel(): string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.permission');
    }

    protected static function getPluralModelLabel(): string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.permissions');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name')),
                TextInput::make('guard_name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // Support changing table heading by translations.
            ->heading(__('filament-spatie-roles-permissions::filament-spatie.section.permissions'))
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name')),
                TextColumn::make('guard_name')
                    ->searchable()
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name')),

            ])
            ->filters([

            ])->headerActions([
                AttachAction::make('Attach Permission')->preloadRecordSelect()->after(fn() => app()
                    ->make(PermissionRegistrar::class)
                    ->forgetCachedPermissions()),
            ])->actions([
                DetachAction::make()->after(fn() => app()->make(PermissionRegistrar::class)->forgetCachedPermissions()),
            ])->bulkActions([
                DetachBulkAction::make()->after(fn() => app()->make(PermissionRegistrar::class)->forgetCachedPermissions()),
               
            ]);
    }
}
