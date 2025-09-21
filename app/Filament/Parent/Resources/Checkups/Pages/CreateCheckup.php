<?php

namespace App\Filament\Parent\Resources\Checkups\Pages;

use App\Filament\Parent\Resources\Checkups\CheckupResource;
use App\Models\Children;
use App\Services\FuzzyTsukamotoService;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class CreateCheckup extends CreateRecord
{
    protected static string $resource = CheckupResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $service = App(FuzzyTsukamotoService::class);

        $children = Children::findOrFail($data['children_id']);

        // Hitung umur dalam bulan
        $data["age_in_months"] = Carbon::parse($children->date_of_birth)->diffInMonths(Carbon::parse($data["checkup_date"]));

        // Implement Fuzzy in here

        $test = $service->inference($data["weight"], $data["height"]);
        Log::info("value = " . $test["value"]);
        Log::info("label = " . $test["label"]);

        return parent::mutateFormDataBeforeCreate($data);
    }


}
