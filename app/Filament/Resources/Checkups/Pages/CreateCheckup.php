<?php

namespace App\Filament\Resources\Checkups\Pages;

use App\Filament\Resources\Checkups\CheckupResource;
use App\Models\Children;
use App\Services\CheckupService;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Carbon;

class CreateCheckup extends CreateRecord
{
    protected static string $resource = CheckupResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $service = App(CheckupService::class);
        $data = $service->checkup($data);

        return parent::mutateFormDataBeforeCreate($data);
    }
}
