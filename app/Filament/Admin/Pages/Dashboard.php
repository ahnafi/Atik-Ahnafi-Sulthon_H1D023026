<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\AgeGroupDistributionChart;
use App\Filament\Admin\Widgets\GenderStatsWidget;
use App\Filament\Admin\Widgets\MonthlyCheckupTrendChart;
use App\Filament\Admin\Widgets\NutritionStatusChart;
use App\Filament\Admin\Widgets\OverallStatsWidget;
use App\Filament\Admin\Widgets\RecentCheckupsWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard Admin - Sistem Monitoring Stunting';

    public function getWidgets(): array
    {
        return [
            OverallStatsWidget::class,
            GenderStatsWidget::class,
            NutritionStatusChart::class,
            MonthlyCheckupTrendChart::class,
            AgeGroupDistributionChart::class,
            RecentCheckupsWidget::class,
        ];
    }

    public function getColumns(): int | array
    {
        return [
            'md' => 2,
            'xl' => 3,
        ];
    }
}