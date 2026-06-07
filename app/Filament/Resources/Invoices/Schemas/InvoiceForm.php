<?php

declare(strict_types=1);

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Facture')
                    ->columns(2)
                    ->schema([
                        Select::make('guardian_id')
                            ->label('Responsable')
                            ->relationship('guardian', 'last_name')
                            ->searchable()
                            ->preload()
                            ->default(null),
                        Select::make('camp_id')
                            ->label('Camp')
                            ->relationship('camp', 'name')
                            ->default(null),
                        TextInput::make('month')
                            ->label('Mois')
                            ->required(),
                        TextInput::make('communication')
                            ->label('Communication')
                            ->default(null),
                    ]),
                Section::make('Suivi')
                    ->description('Dates de facturation et envoi')
                    ->columns(2)
                    ->schema([
                        DateTimePicker::make('invoiced_at')
                            ->label('Facturé le')
                            ->required(),
                        DateTimePicker::make('paid_at')
                            ->label('Payé le'),
                        DateTimePicker::make('sent_at')
                            ->label('Envoyé le'),
                        TextInput::make('sent_to')
                            ->label('Envoyé à')
                            ->default(null),
                    ]),
                Section::make('Destinataire')
                    ->columns(2)
                    ->schema([
                        TextInput::make('last_name')
                            ->label('Nom')
                            ->required(),
                        TextInput::make('first_name')
                            ->label('Prénom')
                            ->default(null),
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
                    ]),
                Section::make('Avancé')
                    ->columns(2)
                    ->collapsed()
                    ->schema([
                        TextInput::make('camp_name')
                            ->label('Nom du camp')
                            ->default(null),
                        TextInput::make('schools')
                            ->label('Écoles')
                            ->default(null),
                        TextInput::make('legacy_amount')
                            ->label('Montant')
                            ->numeric()
                            ->default(null),
                        Toggle::make('legacy_closed')
                            ->label('Clôturé'),
                        Textarea::make('remark')
                            ->label('Remarque')
                            ->default(null)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
