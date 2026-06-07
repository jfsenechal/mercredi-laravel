<?php

declare(strict_types=1);

namespace App\Filament\Resources\Attendances\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Présence')
                    ->description("L'enfant, le responsable et la journée concernés")
                    ->columns(3)
                    ->schema([
                        Select::make('child_id')
                            ->label('Enfant')
                            ->relationship('child', 'last_name')
                            ->searchable()
                            ->preload()
                            ->default(null),
                        Select::make('guardian_id')
                            ->label('Responsable')
                            ->relationship('guardian', 'last_name')
                            ->searchable()
                            ->preload()
                            ->default(null),
                        Select::make('day_id')
                            ->label('Journée')
                            ->relationship('day', 'date')
                            ->searchable()
                            ->preload()
                            ->default(null),
                    ]),
                Section::make('Détails')
                    ->columns(2)
                    ->schema([
                        Select::make('reduction_id')
                            ->label('Réduction')
                            ->relationship('reduction', 'name')
                            ->default(null),
                        Select::make('payment_id')
                            ->label('Paiement')
                            ->relationship('payment', 'id')
                            ->default(null),
                        TextInput::make('absent')
                            ->label('Absent')
                            ->required()
                            ->numeric()
                            ->default(0),
                        TextInput::make('position')
                            ->label('Position')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_half_day')
                            ->label('Demi-journée')
                            ->required(),
                        Toggle::make('is_confirmed')
                            ->label('Confirmé')
                            ->required(),
                        Textarea::make('remark')
                            ->label('Remarque')
                            ->default(null)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
