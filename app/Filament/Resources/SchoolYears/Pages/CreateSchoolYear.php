<?php

declare(strict_types=1);

namespace App\Filament\Resources\SchoolYears\Pages;

use App\Filament\Resources\SchoolYears\SchoolYearResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateSchoolYear extends CreateRecord
{
    protected static string $resource = SchoolYearResource::class;
}
