<?php

declare(strict_types=1);

namespace App\Filament\Resources\SchoolGroups\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class SchoolGroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Groupe scolaire')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->required(),
                        TextInput::make('short_name')
                            ->label('Nom court')
                            ->default(null),
                        TextInput::make('min_age')
                            ->label('Âge minimum')
                            ->numeric()
                            ->default(null),
                        TextInput::make('max_age')
                            ->label('Âge maximum')
                            ->numeric()
                            ->default(null),
                        TextInput::make('position')
                            ->label('Position')
                            ->required()
                            ->numeric()
                            ->default(0),
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
