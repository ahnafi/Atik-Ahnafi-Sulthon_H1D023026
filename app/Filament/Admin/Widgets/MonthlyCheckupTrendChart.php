<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Checkup;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonthlyCheckupTrendChart extends ChartWidget
{
    protected static ?int $sort = 3;

    public function getHeading(): ?string
    {
        return 'Tren Pemeriksaan Bulanan';
    }

    protected function getData(): array
    {
        // Get checkup data for last 6 months
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        
        $monthlyData = Checkup::select(
                DB::raw('DATE_FORMAT(checkup_date, "%Y-%m") as month'),
                DB::raw('count(*) as total_checkups'),
                DB::raw('SUM(CASE WHEN nutrition IN ("stunting", "severely_stunting") THEN 1 ELSE 0 END) as stunting_count'),
                DB::raw('SUM(CASE WHEN nutrition = "normal" THEN 1 ELSE 0 END) as normal_count')
            )
            ->where('checkup_date', '>=', $sixMonthsAgo)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $totalCheckups = [];
        $stuntingCases = [];
        $normalCases = [];

        foreach ($monthlyData as $data) {
            $labels[] = Carbon::createFromFormat('Y-m', $data->month)->format('M Y');
            $totalCheckups[] = $data->total_checkups;
            $stuntingCases[] = $data->stunting_count;
            $normalCases[] = $data->normal_count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Pemeriksaan',
                    'data' => $totalCheckups,
                    'borderColor' => '#3B82F6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Kasus Stunting',
                    'data' => $stuntingCases,
                    'borderColor' => '#EF4444',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Status Normal',
                    'data' => $normalCases,
                    'borderColor' => '#10B981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
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
                    'position' => 'top',
                ],
            ],
        ];
    }
}