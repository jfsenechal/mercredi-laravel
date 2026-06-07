<?php

declare(strict_types=1);

namespace App\Filament\Resources\SchoolGroups;

use App\Filament\Resources\SchoolGroups\Pages\CreateSchoolGroup;
use App\Filament\Resources\SchoolGroups\Pages\EditSchoolGroup;
use App\Filament\Resources\SchoolGroups\Pages\ListSchoolGroups;
use App\Filament\Resources\SchoolGroups\Schemas\SchoolGroupForm;
use App\Filament\Resources\SchoolGroups\Tables\SchoolGroupsTable;
use App\Models\SchoolGroup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class SchoolGroupResource extends Resource
{
    protected static ?string $model = SchoolGroup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|UnitEnum|null $navigationGroup = 'Écoles';

    protected static ?string $modelLabel = 'groupe scolaire';

    protected static ?string $pluralModelLabel = 'groupes scolaires';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return SchoolGroupForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchoolGroupsTable::configure($table);
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
            'index' => ListSchoolGroups::route('/'),
            'create' => CreateSchoolGroup::route('/create'),
            'edit' => EditSchoolGroup::route('/{record}/edit'),
        ];
    }
}
