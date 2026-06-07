<?php

declare(strict_types=1);

namespace App\Filament\Resources\Organizations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class OrganizationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('initials')
                    ->label('Initiales')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Adresse e-mail')
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
                TextColumn::make('website')
                    ->label('Site web')
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
                TextColumn::make('photo_path')
                    ->label('Chemin de la photo')
                    ->searchable(),
                TextColumn::make('mime_type')
                    ->label('Type MIME')
                    ->searchable(),
                TextColumn::make('account_number')
                    ->label('Numéro de compte')
                    ->searchable(),
                TextColumn::make('manager_last_name')
                    ->label('Nom du responsable')
                    ->searchable(),
                TextColumn::make('manager_first_name')
                    ->label('Prénom du responsable')
                    ->searchable(),
                TextColumn::make('manager_role')
                    ->label('Fonction du responsable')
                    ->searchable(),
                TextColumn::make('email_from')
                    ->label('E-mail expéditeur')
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
