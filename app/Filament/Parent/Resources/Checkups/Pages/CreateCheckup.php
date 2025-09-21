<?php

namespace App\Filament\Parent\Resources\Checkups\Pages;

use App\Filament\Parent\Resources\Checkups\CheckupResource;
use App\Models\Children;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Carbon;

class CreateCheckup extends CreateRecord
{
    protected static string $resource = CheckupResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $children = Children::findOrFail($data['children_id']);

        // Hitung umur dalam bulan
        $data["age_in_months"] = Carbon::parse($children->date_of_birth)->diffInMonths(Carbon::parse($data["checkup_date"]));

        // Implement Fuzzy in here

        return parent::mutateFormDataBeforeCreate($data);
    }


}
