<?php

namespace App\Filament\Resources\Checkups\Pages;

use App\Filament\Resources\Checkups\CheckupResource;
use App\Models\Children;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Carbon;

class EditCheckup extends EditRecord
{
    protected static string $resource = CheckupResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {

        $children = Children::findOrFail($data['children_id']);

        // Hitung umur dalam bulan
        $data["age_in_months"] = Carbon::parse($children->date_of_birth)->diffInMonths(Carbon::parse($data["checkup_date"]));

        return parent::mutateFormDataBeforeSave($data);
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
