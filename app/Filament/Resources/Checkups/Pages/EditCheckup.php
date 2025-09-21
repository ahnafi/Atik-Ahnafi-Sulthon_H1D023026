<?php

namespace App\Filament\Resources\Checkups\Pages;

use App\Filament\Resources\Checkups\CheckupResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCheckup extends EditRecord
{
    protected static string $resource = CheckupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
