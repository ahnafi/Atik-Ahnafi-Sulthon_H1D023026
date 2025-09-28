<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Checkup;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class NutritionStatusChart extends ChartWidget
{
    protected static ?int $sort = 2;

    public function getHeading(): ?string
    {
        return 'Distribusi Status Gizi Anak';
    }

    protected function getData(): array
    {
        // Get latest checkup for each child
        $nutritionStats = Checkup::select('nutrition', DB::raw('count(*) as count'))
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('checkups')
                    ->groupBy('children_id');
            })
            ->groupBy('nutrition')
            ->get();

        $labels = [];
        $data = [];
        $colors = [];

        $statusMapping = [
            'normal' => ['label' => 'Normal', 'color' => '#10B981'],
            'stunting' => ['label' => 'Stunting', 'color' => '#F59E0B'],
            'severely_stunting' => ['label' => 'Stunting Berat', 'color' => '#EF4444'],
            'overweight' => ['label' => 'Kelebihan Berat Badan', 'color' => '#8B5CF6'],
            'obesitas' => ['label' => 'Obesitas', 'color' => '#EC4899'],
        ];

        foreach ($nutritionStats as $stat) {
            $status = $statusMapping[$stat->nutrition] ?? ['label' => $stat->nutrition, 'color' => '#6B7280'];
            $labels[] = $status['label'];
            $data[] = $stat->count;
            $colors[] = $status['color'];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anak',
                    'data' => $data,
                    'backgroundColor' => $colors,
                    'borderColor' => $colors,
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}