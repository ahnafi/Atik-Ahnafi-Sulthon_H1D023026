<?php

namespace App\Filament\Resources\Checkups\Pages;

use App\Filament\Resources\Checkups\CheckupResource;
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
        $data = App(CheckupService::class)->checkup($data);

        // Round age to integer for storage
        $data['age_in_months'] = floor($data['age_in_months']);

        Log::info('checkup = '.json_encode($data));

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
