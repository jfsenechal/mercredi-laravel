<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reductions\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ReductionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Réduction')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('percentage')
                            ->label('Pourcentage')
                            ->numeric()
                            ->default(null),
                        TextInput::make('amount')
                            ->label('Montant')
                            ->numeric()
                            ->default(null),
                        Toggle::make('is_flat_rate')
                            ->label('Forfait')
                            ->columnSpanFull(),
                        Textarea::make('remark')
                            ->label('Remarque')
                            ->default(null)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
