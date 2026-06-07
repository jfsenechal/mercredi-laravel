<?php

declare(strict_types=1);

namespace App\Filament\Resources\SchoolYears\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class SchoolYearForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Année scolaire')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->required(),
                        TextInput::make('position')
                            ->label('Position')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Select::make('next_year_id')
                            ->label('Année suivante')
                            ->relationship('nextYear', 'name')
                            ->default(null),
                        Select::make('school_group_id')
                            ->label('Groupe scolaire')
                            ->relationship('schoolGroup', 'name')
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
