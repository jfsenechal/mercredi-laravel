<?php

declare(strict_types=1);

namespace App\Filament\Resources\SchoolGroups\Pages;

use App\Filament\Resources\SchoolGroups\SchoolGroupResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateSchoolGroup extends CreateRecord
{
    protected static string $resource = SchoolGroupResource::class;
}
