<?php

declare(strict_types=1);

namespace App\Filament\Resources\SchoolGroups\Pages;

use App\Filament\Resources\SchoolGroups\SchoolGroupResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditSchoolGroup extends EditRecord
{
    protected static string $resource = SchoolGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
