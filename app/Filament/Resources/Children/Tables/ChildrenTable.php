<?php

declare(strict_types=1);

namespace App\Filament\Resources\Children\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class ChildrenTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('schoolYear.name')
                    ->label('Année scolaire')
                    ->searchable(),
                TextColumn::make('schoolGroup.name')
                    ->label('Groupe scolaire')
                    ->searchable(),
                TextColumn::make('school.name')
                    ->label('École')
                    ->searchable(),
                IconColumn::make('is_photo_authorized')
                    ->label('Photo autorisée')
                    ->boolean(),
                TextColumn::make('last_name')
                    ->label('Nom')
                    ->searchable(),
                TextColumn::make('first_name')
                    ->label('Prénom')
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->label('Date de naissance')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender')
                    ->label('Sexe')
                    ->searchable(),
                TextColumn::make('position')
                    ->label('Position')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('photo_path')
                    ->label('Chemin de la photo')
                    ->searchable(),
                TextColumn::make('mime_type')
                    ->label('Type MIME')
                    ->searchable(),
                IconColumn::make('is_archived')
                    ->label('Archivé')
                    ->boolean(),
                IconColumn::make('is_school_reception')
                    ->label('Accueil scolaire')
                    ->boolean(),
                TextColumn::make('national_register_number')
                    ->label('Numéro de registre national')
                    ->searchable(),
                TextColumn::make('weight')
                    ->label('Poids')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                TextColumn::make('created_by')
                    ->label('Créé par')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Modifié le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
