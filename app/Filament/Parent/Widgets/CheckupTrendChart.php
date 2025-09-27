<?php

namespace App\Filament\Parent\Widgets;

use App\Models\Checkup;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class CheckupTrendChart extends ChartWidget
{
    protected static ?int $sort = 2;
    
    public function getHeading(): ?string
    {
        return 'Trend Pemeriksaan 6 Bulan Terakhir';
    }

    protected function getData(): array
    {
        $months = collect();
        $normalData = [];
        $stuntingData = [];
        $overweightData = [];
        $severeStuntingData = [];
        $obesitasData = [];

        // Generate last 6 months
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months->push($month);

            // Get checkups for this month for current user's children
            $checkupsThisMonth = Checkup::whereHas('children', function ($query) {
                    $query->where('user_id', auth()->id());
                })
                ->whereYear('checkup_date', $month->year)
                ->whereMonth('checkup_date', $month->month)
                ->get();

            $normalData[] = $checkupsThisMonth->where('nutrition', 'normal')->count();
            $stuntingData[] = $checkupsThisMonth->where('nutrition', 'stunting')->count();
            $severeStuntingData[] = $checkupsThisMonth->where('nutrition', 'severely_stunting')->count();
            $overweightData[] = $checkupsThisMonth->where('nutrition', 'overweight')->count();
            $obesitasData[] = $checkupsThisMonth->where('nutrition', 'obesitas')->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Normal',
                    'data' => $normalData,
                    'backgroundColor' => 'rgba(34, 197, 94, 0.2)',
                    'borderColor' => 'rgba(34, 197, 94, 1)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
                [
                    'label' => 'Stunting',
                    'data' => $stuntingData,
                    'backgroundColor' => 'rgba(251, 191, 36, 0.2)',
                    'borderColor' => 'rgba(251, 191, 36, 1)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
                [
                    'label' => 'Severely Stunting',
                    'data' => $severeStuntingData,
                    'backgroundColor' => 'rgba(239, 68, 68, 0.2)',
                    'borderColor' => 'rgba(239, 68, 68, 1)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
                [
                    'label' => 'Kegemukan',
                    'data' => $overweightData,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'borderColor' => 'rgba(59, 130, 246, 1)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
                [
                    'label' => 'Obesitas',
                    'data' => $obesitasData,
                    'backgroundColor' => 'rgba(147, 51, 234, 0.2)',
                    'borderColor' => 'rgba(147, 51, 234, 1)',
                    'borderWidth' => 2,
                    'fill' => true,
                ],
            ],
            'labels' => $months->map(fn ($month) => $month->format('M Y'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
            'interaction' => [
                'intersect' => false,
                'mode' => 'index',
            ],
            'maintainAspectRatio' => false,
        ];
    }
}