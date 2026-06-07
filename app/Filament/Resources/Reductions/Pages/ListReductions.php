<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reductions\Pages;

use App\Filament\Resources\Reductions\ReductionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListReductions extends ListRecords
{
    protected static string $resource = ReductionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
