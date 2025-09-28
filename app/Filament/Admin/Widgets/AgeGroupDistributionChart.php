<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Children;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AgeGroupDistributionChart extends ChartWidget
{
    protected static ?int $sort = 4;

    public function getHeading(): ?string
    {
        return 'Distribusi Anak Berdasarkan Kelompok Umur';
    }

    protected function getData(): array
    {
        // Calculate age groups based on date of birth
        $ageGroups = Children::select(
                DB::raw('
                    CASE 
                        WHEN TIMESTAMPDIFF(MONTH, date_of_birth, NOW()) < 12 THEN "0-11 bulan"
                        WHEN TIMESTAMPDIFF(MONTH, date_of_birth, NOW()) < 24 THEN "12-23 bulan"
                        WHEN TIMESTAMPDIFF(MONTH, date_of_birth, NOW()) < 36 THEN "24-35 bulan"
                        WHEN TIMESTAMPDIFF(MONTH, date_of_birth, NOW()) < 48 THEN "36-47 bulan"
                        ELSE "48+ bulan"
                    END as age_group
                '),
                DB::raw('count(*) as count')
            )
            ->groupBy('age_group')
            ->get();

        $labels = [];
        $data = [];
        $colors = ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6'];

        foreach ($ageGroups as $index => $group) {
            $labels[] = $group->age_group;
            $data[] = $group->count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anak',
                    'data' => $data,
                    'backgroundColor' => array_slice($colors, 0, count($data)),
                    'borderColor' => array_slice($colors, 0, count($data)),
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
        ];
    }
}