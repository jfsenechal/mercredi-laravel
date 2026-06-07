<?php

declare(strict_types=1);

namespace App\Filament\Resources\Days\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class DaysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('camp.name')
                    ->label('Camp')
                    ->searchable(),
                TextColumn::make('date')
                    ->label('Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('price1')
                    ->label('Prix 1')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price2')
                    ->label('Prix 2')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price3')
                    ->label('Prix 3')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('color')
                    ->label('Couleur')
                    ->searchable(),
                IconColumn::make('is_archived')
                    ->label('Archivé')
                    ->boolean(),
                IconColumn::make('is_pedagogical')
                    ->label('Journée pédagogique')
                    ->boolean(),
                TextColumn::make('flat_rate')
                    ->label('Forfait')
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
