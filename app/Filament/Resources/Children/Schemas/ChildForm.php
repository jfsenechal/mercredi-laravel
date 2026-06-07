<?php

declare(strict_types=1);

namespace App\Filament\Resources\Children\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ChildForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identité')
                    ->description("Informations personnelles de l'enfant")
                    ->columns(2)
                    ->schema([
                        TextInput::make('last_name')
                            ->label('Nom')
                            ->required(),
                        TextInput::make('first_name')
                            ->label('Prénom')
                            ->default(null),
                        DatePicker::make('birth_date')
                            ->label('Date de naissance'),
                        TextInput::make('gender')
                            ->label('Sexe')
                            ->default(null),
                        TextInput::make('national_register_number')
                            ->label('Numéro de registre national')
                            ->default(null),
                        TextInput::make('weight')
                            ->label('Poids')
                            ->default(null),
                    ]),
                Section::make('Scolarité')
                    ->columns(2)
                    ->schema([
                        Select::make('school_year_id')
                            ->label('Année scolaire')
                            ->relationship('schoolYear', 'name')
                            ->default(null),
                        Select::make('school_group_id')
                            ->label('Groupe scolaire')
                            ->relationship('schoolGroup', 'name')
                            ->default(null),
                        Select::make('school_id')
                            ->label('École')
                            ->relationship('school', 'name')
                            ->default(null),
                    ]),
                Section::make('Autorisations & statut')
                    ->columns(3)
                    ->schema([
                        Toggle::make('is_photo_authorized')
                            ->label('Photo autorisée')
                            ->required(),
                        Toggle::make('is_school_reception')
                            ->label('Accueil scolaire')
                            ->required(),
                        Toggle::make('is_archived')
                            ->label('Archivé')
                            ->required(),
                    ]),
                Section::make('Remarque')
                    ->schema([
                        Textarea::make('remark')
                            ->label('Remarque')
                            ->default(null)
                            ->columnSpanFull(),
                    ]),
                Section::make('Avancé')
                    ->description('Champs techniques et système')
                    ->columns(2)
                    ->collapsed()
                    ->schema([
                        TextInput::make('position')
                            ->label('Position')
                            ->required()
                            ->numeric()
                            ->default(0),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->default(null),
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
