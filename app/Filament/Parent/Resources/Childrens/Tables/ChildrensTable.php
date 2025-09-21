<?php

namespace App\Filament\Parent\Resources\Childrens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ChildrensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->where("user_id", auth()->id()))
            ->columns([
                TextColumn::make('name')
                    ->label("Nama Anak")
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->label("Tanggal Lahir")
                    ->date()
                    ->sortable(),
                TextColumn::make("gender")
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->badge()
                    ->formatStateUsing(fn($state) => [
                        "L" => "Laki-laki",
                        "P" => "Perempuan",
                    ][$state] ?? $state),

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
