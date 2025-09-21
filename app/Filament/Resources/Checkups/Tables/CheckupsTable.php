<?php

namespace App\Filament\Resources\Checkups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
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

                TextColumn::make("nutritional_status")
                    ->label("Status Nutrisi")
                    ->badge()

            ])
            ->filters([
                //
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
                ]),
            ]);
    }
}
