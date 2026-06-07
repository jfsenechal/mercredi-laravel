<?php

declare(strict_types=1);

namespace App\Filament\Resources\Days\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class DayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Journée')
                    ->columns(2)
                    ->schema([
                        Select::make('camp_id')
                            ->label('Camp')
                            ->relationship('camp', 'name')
                            ->default(null),
                        DatePicker::make('date')
                            ->label('Date')
                            ->required(),
                        TextInput::make('color')
                            ->label('Couleur')
                            ->default(null),
                        Toggle::make('is_pedagogical')
                            ->label('Journée pédagogique')
                            ->required(),
                        Toggle::make('is_archived')
                            ->label('Archivé')
                            ->required(),
                    ]),
                Section::make('Tarifs')
                    ->columns(4)
                    ->schema([
                        TextInput::make('price1')
                            ->label('Prix 1')
                            ->required()
                            ->numeric()
                            ->default(0.0),
                        TextInput::make('price2')
                            ->label('Prix 2')
                            ->required()
                            ->numeric()
                            ->default(0.0),
                        TextInput::make('price3')
                            ->label('Prix 3')
                            ->required()
                            ->numeric()
                            ->default(0.0),
                        TextInput::make('flat_rate')
                            ->label('Forfait')
                            ->required()
                            ->numeric()
                            ->default(0.0),
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
