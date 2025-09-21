<?php

namespace App\Filament\Resources\Childrens\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;

class ChildrenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make("user_id")
                    ->label('Orang Tua/Wali')
                    ->preload()
                    ->searchable()
                    ->relationship("user", "name")
                    ->required(),

                Textinput::make("name")
                    ->label('Nama')
                    ->required(),

                DatePicker::make("date_of_birth")
                    ->label('Tanggal Lahir')
                    ->required(),

                ToggleButtons::make("gender")
                    ->label('Jenis Kelamin')
                    ->required()
                    ->inline()
                    ->options([
                        "L" => "Laki - Laki",
                        "P" => "Perempuan",
                    ])

            ]);
    }
}
