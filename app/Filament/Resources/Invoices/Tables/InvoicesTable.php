<?php

declare(strict_types=1);

namespace App\Filament\Resources\Invoices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class InvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('guardian.last_name')
                    ->label('Responsable')
                    ->searchable(),
                TextColumn::make('camp.name')
                    ->label('Camp')
                    ->searchable(),
                TextColumn::make('invoiced_at')
                    ->label('Facturé le')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('paid_at')
                    ->label('Payé le')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('sent_at')
                    ->label('Envoyé le')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('sent_to')
                    ->label('Envoyé à')
                    ->searchable(),
                TextColumn::make('month')
                    ->label('Mois')
                    ->searchable(),
                TextColumn::make('camp_name')
                    ->label('Nom du camp')
                    ->searchable(),
                TextColumn::make('schools')
                    ->label('Écoles')
                    ->searchable(),
                TextColumn::make('legacy_amount')
                    ->label('Montant')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('legacy_closed')
                    ->label('Clôturé')
                    ->boolean(),
                TextColumn::make('last_name')
                    ->label('Nom')
                    ->searchable(),
                TextColumn::make('first_name')
                    ->label('Prénom')
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
                TextColumn::make('communication')
                    ->label('Communication')
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
