<?php

declare(strict_types=1);

namespace App\Filament\Resources\Reductions\Pages;

use App\Filament\Resources\Reductions\ReductionResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateReduction extends CreateRecord
{
    protected static string $resource = ReductionResource::class;
}
