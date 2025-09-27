<?php

namespace App\Filament\Resources\Checkups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CheckupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("children.name")
                    ->label("Nama Anak")
                    ->searchable(),

                TextColumn::make("children.user.name")
                    ->searchable()
                    ->label("Nama Orang Tua/Wali"),

                TextColumn::make("age_in_months")
                    ->numeric()
                    ->label("Umur Anak (bulan)"),

                TextColumn::make("height")
                    ->numeric()
                    ->label("tinggi (cm)"),

                TextColumn::make("weight")
                    ->numeric()
                    ->label("berat (kg)"),

                TextColumn::make("fuzzy_score")
                    ->numeric()
                    ->label("Nilai Perhitungan"),

                TextColumn::make("nutrition")
                    ->label("Status Nutrisi")
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'normal' => 'Normal',
                        'stunting' => 'Stunting',
                        'severely_stunting' => 'Severely Stunting',
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
                    })

            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make("delete"),
                    RestoreBulkAction::make("restore"),
                    ForceDeleteBulkAction::make()
                ]),
            ]);
    }
}
