<?php

declare(strict_types=1);

namespace App\Filament\Resources\Days\Pages;

use App\Filament\Resources\Days\DayResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateDay extends CreateRecord
{
    protected static string $resource = DayResource::class;
}
