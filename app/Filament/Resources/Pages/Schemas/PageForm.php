<?php

declare(strict_types=1);

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->default(null),
                        TextInput::make('system_slug')
                            ->label('Slug système')
                            ->default(null),
                        TextInput::make('position')
                            ->label('Position')
                            ->numeric()
                            ->default(null),
                        Toggle::make('in_menu')
                            ->label('Dans le menu')
                            ->required(),
                    ]),
                Section::make('Contenu')
                    ->schema([
                        Textarea::make('content')
                            ->label('Contenu')
                            ->default(null)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
