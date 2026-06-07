<?php

declare(strict_types=1);

namespace App\Filament\Resources\Days;

use App\Filament\Resources\Days\Pages\CreateDay;
use App\Filament\Resources\Days\Pages\EditDay;
use App\Filament\Resources\Days\Pages\ListDays;
use App\Filament\Resources\Days\Schemas\DayForm;
use App\Filament\Resources\Days\Tables\DaysTable;
use App\Models\Day;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class DayResource extends Resource
{
    protected static ?string $model = Day::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static string|UnitEnum|null $navigationGroup = 'Activités';

    protected static ?string $modelLabel = 'journée';

    protected static ?string $pluralModelLabel = 'journées';

    public static function form(Schema $schema): Schema
    {
        return DayForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DaysTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDays::route('/'),
            'create' => CreateDay::route('/create'),
            'edit' => EditDay::route('/{record}/edit'),
        ];
    }
}
