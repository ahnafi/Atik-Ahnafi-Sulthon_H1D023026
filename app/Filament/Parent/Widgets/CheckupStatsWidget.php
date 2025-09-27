<?php

namespace App\Filament\Parent\Widgets;

use App\Models\Checkup;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseStatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CheckupStatsWidget extends BaseStatsOverviewWidget
{
    protected function getStats(): array
    {
        $lastMonth = Carbon::now()->subMonth();
        
        // Get checkups from last month for current user's children
        $checkupsLastMonth = Checkup::whereHas('children', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('checkup_date', '>=', $lastMonth)
            ->get();

        $totalCheckups = $checkupsLastMonth->count();
        
        // Count by nutrition status
        $normalCount = $checkupsLastMonth->where('nutrition', 'normal')->count();
        $stuntingCount = $checkupsLastMonth->where('nutrition', 'stunting')->count();
        $severeStuntingCount = $checkupsLastMonth->where('nutrition', 'severely_stunting')->count();
        $overweightCount = $checkupsLastMonth->where('nutrition', 'overweight')->count();
        $obesitasCount = $checkupsLastMonth->where('nutrition', 'obesitas')->count();

        // Calculate percentages for trend
        $normalPercentage = $totalCheckups > 0 ? round(($normalCount / $totalCheckups) * 100, 1) : 0;
        $problemPercentage = $totalCheckups > 0 ? round((($stuntingCount + $severeStuntingCount + $overweightCount + $obesitasCount) / $totalCheckups) * 100, 1) : 0;

        return [
            Stat::make('Total Pemeriksaan Bulan Ini', $totalCheckups)
                ->description('Pemeriksaan dalam 30 hari terakhir')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('primary'),

            Stat::make('Status Normal', $normalCount)
                ->description($normalPercentage . '% dari total pemeriksaan')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Memerlukan Perhatian', $stuntingCount + $severeStuntingCount + $overweightCount + $obesitasCount)
                ->description($problemPercentage . '% memerlukan tindak lanjut')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($problemPercentage > 50 ? 'danger' : ($problemPercentage > 25 ? 'warning' : 'success')),

            Stat::make('Rata-rata Nilai Fuzzy', $totalCheckups > 0 ? round($checkupsLastMonth->avg('fuzzy_score'), 1) : 0)
                ->description('Nilai rata-rata perhitungan sistem')
                ->descriptionIcon('heroicon-m-calculator')
                ->color('info'),
        ];
    }

    protected function getColumns(): int
    {
        return 2;
    }
}