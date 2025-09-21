<?php

namespace App\Filament\Parent\Resources\Childrens\Pages;

use App\Filament\Parent\Resources\Childrens\ChildrenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListChildrens extends ListRecords
{
    protected static string $resource = ChildrenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make("Tambah"),
        ];
    }
}
