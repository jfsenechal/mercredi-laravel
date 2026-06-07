<?php

declare(strict_types=1);

namespace App\Filament\Resources\Guardians\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class GuardianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identité')
                    ->columns(2)
                    ->schema([
                        TextInput::make('last_name')
                            ->label('Nom')
                            ->required(),
                        TextInput::make('first_name')
                            ->label('Prénom')
                            ->default(null),
                        TextInput::make('gender')
                            ->label('Sexe')
                            ->default(null),
                        TextInput::make('national_register_number')
                            ->label('Numéro de registre national')
                            ->default(null),
                    ]),
                Section::make('Coordonnées')
                    ->columns(2)
                    ->schema([
                        TextInput::make('street')
                            ->label('Rue')
                            ->default(null)
                            ->columnSpanFull(),
                        TextInput::make('postal_code')
                            ->label('Code postal')
                            ->default(null),
                        TextInput::make('city')
                            ->label('Ville')
                            ->default(null),
                        TextInput::make('email')
                            ->label('Adresse e-mail')
                            ->email()
                            ->default(null),
                        TextInput::make('phone')
                            ->label('Téléphone')
                            ->tel()
                            ->default(null),
                        TextInput::make('office_phone')
                            ->label('Téléphone bureau')
                            ->tel()
                            ->default(null),
                        TextInput::make('mobile')
                            ->label('GSM')
                            ->default(null),
                    ]),
                Section::make('Partenaire')
                    ->description('Coordonnées du conjoint ou partenaire')
                    ->columns(2)
                    ->collapsed()
                    ->schema([
                        TextInput::make('partner_relation')
                            ->label('Relation du partenaire')
                            ->default(null),
                        TextInput::make('partner_last_name')
                            ->label('Nom du partenaire')
                            ->default(null),
                        TextInput::make('partner_first_name')
                            ->label('Prénom du partenaire')
                            ->default(null),
                        TextInput::make('partner_email')
                            ->label('E-mail du partenaire')
                            ->email()
                            ->default(null),
                        TextInput::make('partner_phone')
                            ->label('Téléphone du partenaire')
                            ->tel()
                            ->default(null),
                        TextInput::make('partner_office_phone')
                            ->label('Téléphone bureau du partenaire')
                            ->tel()
                            ->default(null),
                        TextInput::make('partner_mobile')
                            ->label('GSM du partenaire')
                            ->default(null),
                    ]),
                Section::make('Facturation')
                    ->columns(2)
                    ->schema([
                        TextInput::make('iban')
                            ->label('IBAN')
                            ->default(null),
                        Toggle::make('wants_paper_invoice')
                            ->label('Souhaite une facture papier'),
                    ]),
                Section::make('Autres')
                    ->columns(2)
                    ->schema([
                        Textarea::make('remark')
                            ->label('Remarque')
                            ->default(null)
                            ->columnSpanFull(),
                        Toggle::make('is_archived')
                            ->label('Archivé')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->default(null),
                    ]),
            ]);
    }
}
