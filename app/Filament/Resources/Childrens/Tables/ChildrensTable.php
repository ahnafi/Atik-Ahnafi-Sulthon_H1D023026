<?php

namespace App\Filament\Resources\Childrens\Tables;

use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;
use Phiki\Phast\Text;

class ChildrensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")
                    ->label('Nama Anak')
                    ->searchable()
                    ->sortable(),

                TextColumn::make("user.name")
                    ->label('Orang Tua/Wali')
                    ->searchable()
                    ->sortable(),

                TextColumn::make("date_of_birth")
                    ->sortable()
                    ->date()
                    ->label('Tanggal Lahir'),

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
