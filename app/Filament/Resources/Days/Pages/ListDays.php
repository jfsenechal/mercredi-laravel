<?php

declare(strict_types=1);

namespace App\Filament\Resources\Days\Pages;

use App\Filament\Resources\Days\DayResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListDays extends ListRecords
{
    protected static string $resource = DayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
