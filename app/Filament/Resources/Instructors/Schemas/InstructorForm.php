<?php

declare(strict_types=1);

namespace App\Filament\Resources\Instructors\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class InstructorForm
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
                Section::make('Autres')
                    ->schema([
                        Textarea::make('remark')
                            ->label('Remarque')
                            ->default(null)
                            ->columnSpanFull(),
                        Toggle::make('is_archived')
                            ->label('Archivé')
                            ->required(),
                    ]),
            ]);
    }
}
