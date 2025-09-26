<?php

namespace App\Filament\Parent\Resources\Checkups\Pages;

use App\Filament\Parent\Resources\Checkups\CheckupResource;
use App\Services\CheckupService;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;

class CreateCheckup extends CreateRecord
{
    protected static string $resource = CheckupResource::class;

    /**
     * @throws \Exception
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $service = App(CheckupService::class);
        $data = $service->checkup($data);

        Log::info('checkup = '.json_encode($data));

        return $data;
    }
}
