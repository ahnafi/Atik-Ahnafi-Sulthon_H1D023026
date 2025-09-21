<?php

namespace App\Filament\Resources\Childrens\Pages;

use App\Filament\Resources\Childrens\ChildrenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListChildrens extends ListRecords
{
    protected static string $resource = ChildrenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
