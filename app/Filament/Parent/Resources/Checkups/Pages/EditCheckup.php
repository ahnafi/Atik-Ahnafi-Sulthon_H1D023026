<?php

namespace App\Filament\Parent\Resources\Checkups\Pages;

use App\Filament\Parent\Resources\Checkups\CheckupResource;
use App\Services\CheckupService;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;

class EditCheckup extends EditRecord
{
    protected static string $resource = CheckupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data = App(CheckupService::class)->checkup($data);

        Log::info('checkup = '.json_encode($data));

        return $data;
    }
}
