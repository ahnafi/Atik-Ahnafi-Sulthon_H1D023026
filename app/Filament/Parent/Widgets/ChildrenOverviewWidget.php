<?php

namespace App\Filament\Parent\Widgets;

use App\Models\Children;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ChildrenOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';
    
    public function getHeading(): ?string
    {
        return 'Ringkasan Anak & Pemeriksaan Terakhir';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Children::where('user_id', auth()->id())
                    ->with(['checkups' => function ($query) {
                        $query->latest('checkup_date')->limit(1);
                    }])
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Anak')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'L' => 'info',
                        'P' => 'warning',
                        default => 'gray',
                    }),
                    
                TextColumn::make('date_of_birth')
                    ->label('Tanggal Lahir')
                    ->date('d/m/Y'),
                    
                TextColumn::make('age')
                    ->label('Usia Saat Ini')
                    ->getStateUsing(function ($record) {
                        $months = Carbon::parse($record->date_of_birth)->diffInMonths(Carbon::now());
                        $years = floor($months / 12);
                        $remainingMonths = $months % 12;
                        
                        if ($years > 0) {
                            return $years . ' thn ' . $remainingMonths . ' bln';
                        }
                        return $months . ' bulan';
                    }),
                    
                TextColumn::make('checkups.checkup_date')
                    ->label('Pemeriksaan Terakhir')
                    ->date('d/m/Y')
                    ->placeholder('Belum ada pemeriksaan')
                    ->sortable(),
                    
                TextColumn::make('checkups.nutrition')
                    ->label('Status Terakhir')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'normal' => 'Normal',
                        'stunting' => 'Stunting',
                        'severely_stunting' => 'Severely Stunting',
                        'overweight' => 'Kegemukan',
                        'obesitas' => 'Obesitas',
                        null => 'Belum ada data',
                        default => $state,
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'normal' => 'success',
                        'stunting' => 'warning',
                        'severely_stunting' => 'danger',
                        'overweight' => 'info',
                        'obesitas' => 'danger',
                        null => 'gray',
                        default => 'gray',
                    })
                    ->placeholder('Belum ada data'),
                    
                TextColumn::make('days_since_last_checkup')
                    ->label('Hari Sejak Pemeriksaan')
                    ->getStateUsing(function ($record) {
                        $lastCheckup = $record->checkups->first();
                        if (!$lastCheckup) {
                            return 'Belum pernah';
                        }
                        
                        $daysSince = Carbon::parse($lastCheckup->checkup_date)->diffInDays(Carbon::now());
                        
                        if ($daysSince == 0) {
                            return 'Hari ini';
                        } elseif ($daysSince == 1) {
                            return '1 hari yang lalu';
                        } else {
                            return $daysSince . ' hari yang lalu';
                        }
                    })
                    ->color(function ($record): string {
                        $lastCheckup = $record->checkups->first();
                        if (!$lastCheckup) {
                            return 'danger';
                        }
                        
                        $daysSince = Carbon::parse($lastCheckup->checkup_date)->diffInDays(Carbon::now());
                        
                        if ($daysSince <= 30) {
                            return 'success';
                        } elseif ($daysSince <= 60) {
                            return 'warning';
                        } else {
                            return 'danger';
                        }
                    }),
                    
                // Action::make("Cek Sekarang")
                //     ->url(fn ($record): string => '/u/checkups/create?children_id=' . $record->id)
                //     ->color('primary'),
            ])
            ->emptyStateHeading('Belum ada data anak')
            ->emptyStateDescription('Silakan tambahkan data anak terlebih dahulu.')
            ->emptyStateIcon('heroicon-o-users');
    }
}