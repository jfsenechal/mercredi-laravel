<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Resources\Users\Pages\CreateUser;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

final class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Utilisateur')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('email')
                            ->label('Adresse e-mail')
                            ->maxLength(255)
                            ->unique()
                            ->email()
                            ->required(),
                        TextInput::make('password')
                            ->label('Mot de passe')
                            ->password()
                            ->required(fn ($livewire): bool => $livewire instanceof CreateUser)
                            ->revealable(filament()->arePasswordsRevealable())
                            ->rule(Password::default())
                            ->autocomplete('new-password')
                            ->dehydrated(fn ($state): bool => filled($state))
                            ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
