<?php

namespace App\Filament\Resources\Checkups\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Carbon;

class CheckupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('children_id')
                    ->label('Nama Anak')
                    ->relationship('children', 'name')
                    ->required(),
                DatePicker::make('checkup_date')
                    ->default(Carbon::now())
                    ->timezone('Asia/Jakarta')
                    ->displayFormat('d/m/Y')
                    ->label('Tanggal Pengecekan')
                    ->required(),
                TextInput::make('height')
                    ->label('Tinggi (cm)')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('weight')
                    ->label('Berat (kg)')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('age_in_months')
                    ->label('Umur (Bulan)')
                    ->live(onBlur: true)
                    ->disabled()
                    ->hiddenOn('create')
                    ->numeric()
                    ->default(null),
                TextInput::make('fuzzy_score')
                    ->live(onBlur: true)
                    ->label('Nilai Pengecekan')
                    ->numeric()
                    ->disabled()
                    ->hiddenOn('create')
                    ->default(0.0),
                Select::make('nutrition')
                    ->live(onBlur: true)
                    ->label('Status Anak')
                    ->disabled()
                    ->hiddenOn('create')
                    ->options([
                        'normal' => 'Normal',
                        'stunting' => 'Stunting',
                        'severely_stunting' => 'Sangat stunting',
                        'overweight' => 'Overweight',
                        'obesitas' => 'Obesitas',
                    ])
                    ->default(null),

            ]);
    }
}
