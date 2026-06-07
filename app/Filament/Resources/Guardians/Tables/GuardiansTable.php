<?php

declare(strict_types=1);

namespace App\Filament\Resources\Guardians\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class GuardiansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
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
                TextColumn::make('email')
                    ->label('Adresse e-mail')
                    ->searchable(),
                TextColumn::make('partner_relation')
                    ->label('Relation du partenaire')
                    ->searchable(),
                TextColumn::make('partner_last_name')
                    ->label('Nom du partenaire')
                    ->searchable(),
                TextColumn::make('partner_first_name')
                    ->label('Prénom du partenaire')
                    ->searchable(),
                TextColumn::make('partner_phone')
                    ->label('Téléphone du partenaire')
                    ->searchable(),
                TextColumn::make('partner_office_phone')
                    ->label('Téléphone bureau du partenaire')
                    ->searchable(),
                TextColumn::make('partner_mobile')
                    ->label('GSM du partenaire')
                    ->searchable(),
                TextColumn::make('partner_email')
                    ->label('E-mail du partenaire')
                    ->searchable(),
                TextColumn::make('gender')
                    ->label('Sexe')
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
                IconColumn::make('is_archived')
                    ->label('Archivé')
                    ->boolean(),
                IconColumn::make('wants_paper_invoice')
                    ->label('Souhaite une facture papier')
                    ->boolean(),
                TextColumn::make('iban')
                    ->label('IBAN')
                    ->searchable(),
                TextColumn::make('national_register_number')
                    ->label('Numéro de registre national')
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
