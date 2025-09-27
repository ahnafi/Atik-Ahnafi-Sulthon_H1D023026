<?php

namespace App\Filament\Parent\Resources\Checkups\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CheckupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('children', function (Builder $query) {
                $query->where('user_id', auth()->id());
            }))
            ->columns([
                TextColumn::make('children.name')
                    ->label('Nama Anak')
                    ->searchable(),
                TextColumn::make('checkup_date')
                    ->label('Tanggal Pengecekan')
                    ->date()
                    ->sortable(),
                TextColumn::make('children.gender')
                    ->badge()
                    ->label('Jenis Kelamin'),
                TextColumn::make('age_in_months')
                    ->label('Umur (Bulan)')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('height')
                    ->label('Tinggi (cm)')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('weight')
                    ->label('Berat (kg)')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fuzzy_score')
                    ->label('Nilai Pengecekan')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nutrition')
                    ->label('Status Anak')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'normal' => 'Normal',
                        'stunting' => 'Stunting',
                        'severely_stunting' => 'Sangat Stunting',
                        'overweight' => 'Kegemukan',
                        'obesitas' => 'Obesitas',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'normal' => 'success',
                        'stunting' => 'warning',
                        'severely_stunting' => 'danger',
                        'overweight' => 'info',
                        'obesitas' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
