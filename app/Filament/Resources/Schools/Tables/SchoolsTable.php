<?php

declare(strict_types=1);

namespace App\Filament\Resources\Schools\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class SchoolsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('abbreviation')
                    ->label('Abréviation')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                TextColumn::make('street')
                    ->label('Rue')
                    ->searchable(),
                TextColumn::make('postal_code')
                    ->label('Code postal')
                    ->searchable(),
                TextColumn::make('city')
                    ->label('Ville')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Téléphone')
                    ->searchable(),
                TextColumn::make('office_phone')
                    ->label('Téléphone bureau')
                    ->searchable(),
                TextColumn::make('mobile')
                    ->label('GSM')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Adresse e-mail')
                    ->searchable(),
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
