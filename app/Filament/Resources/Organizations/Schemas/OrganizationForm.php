<?php

declare(strict_types=1);

namespace App\Filament\Resources\Organizations\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class OrganizationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identité')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->required(),
                        TextInput::make('initials')
                            ->label('Initiales')
                            ->default(null),
                        TextInput::make('email')
                            ->label('Adresse e-mail')
                            ->email()
                            ->required(),
                        TextInput::make('email_from')
                            ->label('E-mail expéditeur')
                            ->email()
                            ->default(null),
                        TextInput::make('website')
                            ->label('Site web')
                            ->url()
                            ->default(null),
                        TextInput::make('account_number')
                            ->label('Numéro de compte')
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
                Section::make('Responsable')
                    ->columns(3)
                    ->schema([
                        TextInput::make('manager_last_name')
                            ->label('Nom du responsable')
                            ->default(null),
                        TextInput::make('manager_first_name')
                            ->label('Prénom du responsable')
                            ->default(null),
                        TextInput::make('manager_role')
                            ->label('Fonction du responsable')
                            ->default(null),
                    ]),
                Section::make('Avancé')
                    ->columns(2)
                    ->collapsed()
                    ->schema([
                        Textarea::make('remark')
                            ->label('Remarque')
                            ->default(null)
                            ->columnSpanFull(),
                        TextInput::make('photo_path')
                            ->label('Chemin de la photo')
                            ->default(null),
                        TextInput::make('mime_type')
                            ->label('Type MIME')
                            ->default(null),
                    ]),
            ]);
    }
}
