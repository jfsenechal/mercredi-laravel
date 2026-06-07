<?php

declare(strict_types=1);

namespace App\Filament\Resources\Children\Pages;

use App\Filament\Resources\Children\ChildResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditChild extends EditRecord
{
    protected static string $resource = ChildResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
