<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reductions\Pages;

use App\Filament\Resources\Reductions\ReductionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditReduction extends EditRecord
{
    protected static string $resource = ReductionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
