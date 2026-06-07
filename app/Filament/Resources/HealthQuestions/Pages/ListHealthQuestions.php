<?php

declare(strict_types=1);

namespace App\Filament\Resources\HealthQuestions\Pages;

use App\Filament\Resources\HealthQuestions\HealthQuestionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListHealthQuestions extends ListRecords
{
    protected static string $resource = HealthQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
