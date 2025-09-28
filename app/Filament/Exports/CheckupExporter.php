<?php

namespace App\Filament\Exports;

use App\Models\Checkup;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class CheckupExporter extends Exporter
{
    protected static ?string $model = Checkup::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('children.name'),
            ExportColumn::make('checkup_date'),
            ExportColumn::make('age_in_months'),
            ExportColumn::make('height'),
            ExportColumn::make('weight'),
            ExportColumn::make('fuzzy_score'),
            ExportColumn::make('nutrition'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('deleted_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your checkup export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
