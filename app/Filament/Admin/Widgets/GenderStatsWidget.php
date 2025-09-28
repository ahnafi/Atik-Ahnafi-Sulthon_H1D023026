<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Children;
use App\Models\Checkup;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class GenderStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalBoys = Children::where('gender', 'L')->count();
        $totalGirls = Children::where('gender', 'P')->count();

        // Get stunting statistics by gender
        $stuntingByGender = Checkup::select('children.gender', DB::raw('count(*) as count'))
            ->join('childrens as children', 'checkups.children_id', '=', 'children.id')
            ->whereIn('checkups.id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('checkups')
                    ->groupBy('children_id');
            })
            ->whereIn('nutrition', ['stunting', 'severely_stunting'])
            ->groupBy('children.gender')
            ->get()
            ->keyBy('gender');

        $stuntingBoys = $stuntingByGender->get('L')->count ?? 0;
        $stuntingGirls = $stuntingByGender->get('P')->count ?? 0;

        $stuntingBoysPercentage = $totalBoys > 0 ? round(($stuntingBoys / $totalBoys) * 100, 1) : 0;
        $stuntingGirlsPercentage = $totalGirls > 0 ? round(($stuntingGirls / $totalGirls) * 100, 1) : 0;

        return [
            Stat::make('Anak Laki-laki', $totalBoys)
                ->description("{$stuntingBoys} stunting ({$stuntingBoysPercentage}%)")
                ->descriptionIcon('heroicon-m-user')
                ->color('info'),
            
            Stat::make('Anak Perempuan', $totalGirls)
                ->description("{$stuntingGirls} stunting ({$stuntingGirlsPercentage}%)")
                ->descriptionIcon('heroicon-m-user')
                ->color('warning'),
        ];
    }
}