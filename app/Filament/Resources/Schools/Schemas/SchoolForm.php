<?php

declare(strict_types=1);

namespace App\Filament\Resources\Schools\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class SchoolForm
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
                        TextInput::make('abbreviation')
                            ->label('Abréviation')
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
                        TextInput::make('email')
                            ->label('Adresse e-mail')
                            ->email()
                            ->default(null),
                    ]),
                Section::make('Remarque')
                    ->schema([
                        Textarea::make('remark')
                            ->label('Remarque')
                            ->default(null)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
