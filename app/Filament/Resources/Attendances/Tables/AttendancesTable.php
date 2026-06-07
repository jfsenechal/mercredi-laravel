<?php

declare(strict_types=1);

namespace App\Filament\Resources\Attendances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class AttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('child.last_name')
                    ->label('Enfant')
                    ->searchable(),
                TextColumn::make('guardian.last_name')
                    ->label('Responsable')
                    ->searchable(),
                TextColumn::make('day.date')
                    ->label('Journée')
                    ->date()
                    ->sortable(),
                TextColumn::make('reduction.name')
                    ->label('Réduction')
                    ->searchable(),
                TextColumn::make('absent')
                    ->label('Absent')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('position')
                    ->label('Position')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_half_day')
                    ->label('Demi-journée')
                    ->boolean(),
                IconColumn::make('is_confirmed')
                    ->label('Confirmé')
                    ->boolean(),
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
