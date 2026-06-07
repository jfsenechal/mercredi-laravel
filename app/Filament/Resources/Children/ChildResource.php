<?php

declare(strict_types=1);

namespace App\Filament\Resources\Children;

use App\Filament\Resources\Children\Pages\CreateChild;
use App\Filament\Resources\Children\Pages\EditChild;
use App\Filament\Resources\Children\Pages\ListChildren;
use App\Filament\Resources\Children\Schemas\ChildForm;
use App\Filament\Resources\Children\Tables\ChildrenTable;
use App\Models\Child;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class ChildResource extends Resource
{
    protected static ?string $model = Child::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFaceSmile;

    protected static string|UnitEnum|null $navigationGroup = 'Personnes';

    protected static ?string $modelLabel = 'enfant';

    protected static ?string $pluralModelLabel = 'enfants';

    protected static ?string $recordTitleAttribute = 'last_name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['last_name', 'first_name'];
    }

    public static function form(Schema $schema): Schema
    {
        return ChildForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChildrenTable::configure($table);
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
            'index' => ListChildren::route('/'),
            'create' => CreateChild::route('/create'),
            'edit' => EditChild::route('/{record}/edit'),
        ];
    }
}
