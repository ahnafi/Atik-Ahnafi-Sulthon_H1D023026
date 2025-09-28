<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Children;
use App\Models\Checkup;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverallStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalChildren = Children::count();
        $totalCheckups = Checkup::count();
        
        // Get latest checkup for each child to determine current status
        $latestCheckups = Checkup::select('children_id', 'nutrition')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('checkups')
                    ->groupBy('children_id');
            })
            ->get();

        $stuntingCount = $latestCheckups->whereIn('nutrition', ['stunting', 'severely_stunting'])->count();
        $normalCount = $latestCheckups->where('nutrition', 'normal')->count();
        $overweightCount = $latestCheckups->whereIn('nutrition', ['overweight', 'obesitas'])->count();

        $stuntingPercentage = $totalChildren > 0 ? round(($stuntingCount / $totalChildren) * 100, 1) : 0;

        return [
            Stat::make('Total Anak', $totalChildren)
                ->description('Jumlah seluruh anak terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
            
            Stat::make('Anak Stunting', $stuntingCount)
                ->description("{$stuntingPercentage}% dari total anak")
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger'),
            
            Stat::make('Pertumbuhan Normal', $normalCount)
                ->description('Anak dengan status gizi normal')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            
            Stat::make('Total Pemeriksaan', $totalCheckups)
                ->description('Jumlah seluruh pemeriksaan')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('info'),
        ];
    }
}