<?php

namespace App\Filament\Resources\Checkups\Pages;

use App\Filament\Resources\Checkups\CheckupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCheckups extends ListRecords
{
    protected static string $resource = CheckupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
