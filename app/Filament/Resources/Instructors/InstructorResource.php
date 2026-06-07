<?php

declare(strict_types=1);

namespace App\Filament\Resources\Instructors;

use App\Filament\Resources\Instructors\Pages\CreateInstructor;
use App\Filament\Resources\Instructors\Pages\EditInstructor;
use App\Filament\Resources\Instructors\Pages\ListInstructors;
use App\Filament\Resources\Instructors\Schemas\InstructorForm;
use App\Filament\Resources\Instructors\Tables\InstructorsTable;
use App\Models\Instructor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class InstructorResource extends Resource
{
    protected static ?string $model = Instructor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static string|UnitEnum|null $navigationGroup = 'Personnes';

    protected static ?string $modelLabel = 'animateur';

    protected static ?string $pluralModelLabel = 'animateurs';

    protected static ?string $recordTitleAttribute = 'last_name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['last_name', 'first_name'];
    }

    public static function form(Schema $schema): Schema
    {
        return InstructorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstructorsTable::configure($table);
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
            'index' => ListInstructors::route('/'),
            'create' => CreateInstructor::route('/create'),
            'edit' => EditInstructor::route('/{record}/edit'),
        ];
    }
}
