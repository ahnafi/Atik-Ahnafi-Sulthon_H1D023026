<?php

namespace App\Filament\Resources\Checkups\Pages;

use App\Filament\Resources\Checkups\CheckupResource;
use App\Services\CheckupService;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;

class EditCheckup extends EditRecord
{
    protected static string $resource = CheckupResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data = App(CheckupService::class)->checkup($data);

        // Round age to integer for storage
        $data['age_in_months'] = floor($data['age_in_months']);

        Log::info('checkup = '.json_encode($data));

        return $data;
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }
}
