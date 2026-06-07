<?php

declare(strict_types=1);

namespace App\Filament\Resources\Attendances\Pages;

use App\Filament\Resources\Attendances\AttendanceResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateAttendance extends CreateRecord
{
    protected static string $resource = AttendanceResource::class;
}
