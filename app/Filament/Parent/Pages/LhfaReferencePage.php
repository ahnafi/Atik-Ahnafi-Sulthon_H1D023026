<?php

namespace App\Filament\Parent\Pages;

use App\Data\LhfaFiveYears;
use Filament\Pages\Page;
use BackedEnum;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class LhfaReferencePage extends Page
{
    protected static BackedEnum|string|null $navigationIcon = Heroicon::ArrowTrendingUp;

    protected string $view = 'filament.parent.pages.lhfa-reference-page';

    protected static ?string $navigationLabel = 'Acuan Tinggi Badan';

    protected static ?string $title = 'Acuan Tinggi Badan Sesuai Umur (LHFA)';

    protected static ?int $navigationSort = 4;

    public function getBoysData(): Collection
    {
        return collect(LhfaFiveYears::$LHFABOYS)->map(function ($data) {
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
        return collect(LhfaFiveYears::$LHFAGIRLS)
            ->filter(function ($data) {
                // Filter out incomplete data entries
                return isset($data['SD0']) && isset($data['SD3neg'])
                    && isset($data['SD2neg']) && isset($data['SD1neg'])
                    && isset($data['SD1']) && isset($data['SD2'])
                    && isset($data['SD3']);
            })
            ->map(function ($data) {
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
