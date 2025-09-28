<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Checkup;
use App\Models\Children;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentCheckupsWidget extends BaseWidget
{
    protected static ?int $sort = 5;

    public function getHeading(): ?string
    {
        return 'Pemeriksaan Terbaru';
    }

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Checkup::query()
                    ->with(['children'])
                    ->latest('checkup_date')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('children.name')
                    ->label('Nama Anak')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('checkup_date')
                    ->label('Tanggal Pemeriksaan')
                    ->date('d M Y')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('age_in_months')
                    ->label('Umur (Bulan)')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('height')
                    ->label('Tinggi (cm)')
                    ->numeric(2)
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('weight')
                    ->label('Berat (kg)')
                    ->numeric(2)
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('nutrition')
                    ->label('Status Gizi')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'normal' => 'success',
                        'stunting' => 'warning',
                        'severely_stunting' => 'danger',
                        'overweight' => 'info',
                        'obesitas' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(function (string $state): string {
                        return match ($state) {
                            'normal' => 'Normal',
                            'stunting' => 'Stunting',
                            'severely_stunting' => 'Stunting Berat',
                            'overweight' => 'Kelebihan BB',
                            'obesitas' => 'Obesitas',
                            default => $state,
                        };
                    }),
                
                Tables\Columns\TextColumn::make('fuzzy_score')
                    ->label('Skor Fuzzy')
                    ->numeric(2)
                    ->sortable(),
            ]);
    }
}