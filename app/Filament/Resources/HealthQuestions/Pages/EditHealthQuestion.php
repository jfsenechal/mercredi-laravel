<?php

declare(strict_types=1);

namespace App\Filament\Resources\HealthQuestions\Pages;

use App\Filament\Resources\HealthQuestions\HealthQuestionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditHealthQuestion extends EditRecord
{
    protected static string $resource = HealthQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
