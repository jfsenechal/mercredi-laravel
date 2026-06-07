<?php

declare(strict_types=1);

namespace App\Filament\Resources\SchoolGroups\Pages;

use App\Filament\Resources\SchoolGroups\SchoolGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListSchoolGroups extends ListRecords
{
    protected static string $resource = SchoolGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
