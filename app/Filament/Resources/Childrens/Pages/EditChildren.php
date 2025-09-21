<?php

namespace App\Filament\Resources\Childrens\Pages;

use App\Filament\Resources\Childrens\ChildrenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditChildren extends EditRecord
{
    protected static string $resource = ChildrenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
