<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reductions;

use App\Filament\Resources\Reductions\Pages\CreateReduction;
use App\Filament\Resources\Reductions\Pages\EditReduction;
use App\Filament\Resources\Reductions\Pages\ListReductions;
use App\Filament\Resources\Reductions\Schemas\ReductionForm;
use App\Filament\Resources\Reductions\Tables\ReductionsTable;
use App\Models\Reduction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class ReductionResource extends Resource
{
    protected static ?string $model = Reduction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedReceiptPercent;

    protected static string|UnitEnum|null $navigationGroup = 'Activités';

    protected static ?string $modelLabel = 'réduction';

    protected static ?string $pluralModelLabel = 'réductions';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ReductionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReductionsTable::configure($table);
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
            'index' => ListReductions::route('/'),
            'create' => CreateReduction::route('/create'),
            'edit' => EditReduction::route('/{record}/edit'),
        ];
    }
}
