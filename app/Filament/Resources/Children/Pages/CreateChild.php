<?php

declare(strict_types=1);

namespace App\Filament\Resources\Children\Pages;

use App\Filament\Resources\Children\ChildResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateChild extends CreateRecord
{
    protected static string $resource = ChildResource::class;
}
