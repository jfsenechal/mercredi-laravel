<?php

declare(strict_types=1);

namespace App\Filament\Resources\HealthQuestions\Pages;

use App\Filament\Resources\HealthQuestions\HealthQuestionResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateHealthQuestion extends CreateRecord
{
    protected static string $resource = HealthQuestionResource::class;
}
