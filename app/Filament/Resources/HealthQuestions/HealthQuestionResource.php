<?php

declare(strict_types=1);

namespace App\Filament\Resources\HealthQuestions;

use App\Filament\Resources\HealthQuestions\Pages\CreateHealthQuestion;
use App\Filament\Resources\HealthQuestions\Pages\EditHealthQuestion;
use App\Filament\Resources\HealthQuestions\Pages\ListHealthQuestions;
use App\Filament\Resources\HealthQuestions\Schemas\HealthQuestionForm;
use App\Filament\Resources\HealthQuestions\Tables\HealthQuestionsTable;
use App\Models\HealthQuestion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class HealthQuestionResource extends Resource
{
    protected static ?string $model = HealthQuestion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static string|UnitEnum|null $navigationGroup = 'Santé';

    protected static ?string $modelLabel = 'question de santé';

    protected static ?string $pluralModelLabel = 'questions de santé';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return HealthQuestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HealthQuestionsTable::configure($table);
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
            'index' => ListHealthQuestions::route('/'),
            'create' => CreateHealthQuestion::route('/create'),
            'edit' => EditHealthQuestion::route('/{record}/edit'),
        ];
    }
}
