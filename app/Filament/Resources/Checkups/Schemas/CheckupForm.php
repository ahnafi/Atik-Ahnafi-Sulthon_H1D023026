<?php

namespace App\Filament\Resources\Checkups\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;

class CheckupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make("children_id")
                    ->label("Nama Anak")
                    ->relationship("children", "name")
                    ->searchable()
                    ->preload()
                    ->required(),

                DatePicker::make("checkup_date")
                    ->label("Tanggal Pengecekan")
                    ->default(\Illuminate\Support\Carbon::now())
                    ->required(),

                TextInput::make("age_in_months")
                    ->label("Umur (dalam bulan)")
                    ->visibleOn(["view", "edit"])
                    ->required(),

                Textinput::make("height")
                    ->label("Tinggi Badan (dalam cm)")
                    ->integer()
                    ->maxValue(250)
                    ->default(0)
                    ->required(),

                TextInput::make("weight")
                    ->label("Berat Badan (dalam kg)")
                    ->integer()
                    ->default(0)
                    ->maxValue(200)
                    ->required(),

                TextInput::make("fuzzy_score")
                    ->label("Nilai keluaran fuzzy")
                    ->default(0)
                    ->visibleOn(["edit", "view"])
                    ->disabled(),

                Select::make("nutritional_status")
                    ->label("Nilai Nutrisi Pada anak")
                    ->visibleOn(["view", "edit"])
                    ->disabled()
                    ->options([
                        "normal", "stunting", "severely_stunting", "overweight", "obesitas"
                    ])

            ]);
    }
}
