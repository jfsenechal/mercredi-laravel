<?php

declare(strict_types=1);

namespace App\Filament\Resources\HealthQuestions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class HealthQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Question de santé')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('category')
                            ->label('Catégorie')
                            ->default(null),
                        TextInput::make('display_order')
                            ->label("Ordre d'affichage")
                            ->numeric()
                            ->default(null),
                    ]),
                Section::make('Complément')
                    ->description('Champ de réponse libre associé à la question')
                    ->columns(2)
                    ->schema([
                        Toggle::make('has_complement')
                            ->label('A un complément')
                            ->required(),
                        TextInput::make('complement_label')
                            ->label('Libellé du complément')
                            ->default(null),
                    ]),
            ]);
    }
}
