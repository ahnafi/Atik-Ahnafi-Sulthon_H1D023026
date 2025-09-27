<?php

namespace App\Filament\Parent\Widgets;

use App\Models\Checkup;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class NutritionStatusChart extends ChartWidget
{
    protected static ?int $sort = 3;
    
    public function getHeading(): ?string
    {
        return 'Distribusi Status Gizi Bulan Ini';
    }

    protected function getData(): array
    {
        $lastMonth = Carbon::now()->subMonth();
        
        // Get checkups from last month for current user's children
        $checkupsLastMonth = Checkup::whereHas('children', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('checkup_date', '>=', $lastMonth)
            ->get();

        $normalCount = $checkupsLastMonth->where('nutrition', 'normal')->count();
        $stuntingCount = $checkupsLastMonth->where('nutrition', 'stunting')->count();
        $severeStuntingCount = $checkupsLastMonth->where('nutrition', 'severely_stunting')->count();
        $overweightCount = $checkupsLastMonth->where('nutrition', 'overweight')->count();
        $obesitasCount = $checkupsLastMonth->where('nutrition', 'obesitas')->count();

        return [
            'datasets' => [
                [
                    'data' => [
                        $normalCount,
                        $stuntingCount,
                        $severeStuntingCount,
                        $overweightCount,
                        $obesitasCount,
                    ],
                    'backgroundColor' => [
                        'rgba(34, 197, 94, 0.8)',   // Normal - Green
                        'rgba(251, 191, 36, 0.8)',  // Stunting - Yellow
                        'rgba(239, 68, 68, 0.8)',   // Severely Stunting - Red
                        'rgba(59, 130, 246, 0.8)',  // Overweight - Blue
                        'rgba(147, 51, 234, 0.8)',  // Obesitas - Purple
                    ],
                    'borderColor' => [
                        'rgba(34, 197, 94, 1)',
                        'rgba(251, 191, 36, 1)',
                        'rgba(239, 68, 68, 1)',
                        'rgba(59, 130, 246, 1)',
                        'rgba(147, 51, 234, 1)',
                    ],
                    'borderWidth' => 2,
                ],
            ],
            'labels' => [
                'Normal',
                'Stunting',
                'Severely Stunting',
                'Kegemukan',
                'Obesitas',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = total > 0 ? Math.round((context.parsed / total) * 100) : 0;
                            return context.label + ": " + context.parsed + " (" + percentage + "%)";
                        }',
                    ],
                ],
            ],
            'maintainAspectRatio' => false,
            'responsive' => true,
        ];
    }
}