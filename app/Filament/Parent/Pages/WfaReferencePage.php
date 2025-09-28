<?php

namespace App\Filament\Parent\Pages;

use App\Data\WfaFiveYears;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class WfaReferencePage extends Page
{
    protected static BackedEnum|string|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected string $view = 'filament.parent.pages.wfa-reference-page';

    protected static ?string $navigationLabel = 'Acuan Berat Badan';

    protected static ?string $title = 'Acuan Berat Badan Sesuai Umur (WFA)';

    protected static ?int $navigationSort = 3;

    public function getBoysData(): Collection
    {
        return collect(WfaFiveYears::$WFABOYS)->map(function ($data) {
            return (object) [
                'month' => $data['Month'],
                'age' => $this->formatAge($data['Month']),
                'sd3neg' => $data['SD3neg'],
                'sd2neg' => $data['SD2neg'],
                'sd1neg' => $data['SD1neg'],
                'median' => $data['SD0'],
                'sd1' => $data['SD1'],
                'sd2' => $data['SD2'],
                'sd3' => $data['SD3'],
            ];
        });
    }

    public function getGirlsData(): Collection
    {
        return collect(WfaFiveYears::$WFAGIRLS)->map(function ($data) {
            return (object) [
                'month' => $data['Month'],
                'age' => $this->formatAge($data['Month']),
                'sd3neg' => $data['SD3neg'],
                'sd2neg' => $data['SD2neg'],
                'sd1neg' => $data['SD1neg'],
                'median' => $data['SD0'],
                'sd1' => $data['SD1'],
                'sd2' => $data['SD2'],
                'sd3' => $data['SD3'],
            ];
        });
    }

    private function formatAge(int $months): string
    {
        if ($months < 12) {
            return $months.' bulan';
        }

        $years = intval($months / 12);
        $remainingMonths = $months % 12;

        if ($remainingMonths === 0) {
            return $years.' tahun';
        }

        return $years.' tahun '.$remainingMonths.' bulan';
    }
}
