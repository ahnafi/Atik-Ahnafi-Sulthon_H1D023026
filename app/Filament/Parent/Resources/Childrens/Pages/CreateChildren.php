<?php

namespace App\Filament\Parent\Resources\Childrens\Pages;

use App\Filament\Parent\Resources\Childrens\ChildrenResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\NoReturn;

class CreateChildren extends CreateRecord
{
    protected static string $resource = ChildrenResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
