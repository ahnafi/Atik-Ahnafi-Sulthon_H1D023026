<?php

namespace App\Filament\Parent\Resources\Childrens\Schemas;

use Filament\Forms\Components\DatePicker;
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
                TextInput::make('name')
                    ->label("Nama Lengkap Anak")
                    ->required(),
                DatePicker::make('date_of_birth')
                    ->label("Tanggal Lahir")
                    ->required(),
                ToggleButtons::make('gender')
                    ->inline()
                    ->label("Jenis Kelamin")
                    ->options(['L' => 'Laki - laki', 'P' => 'Perempuan'])
                    ->required(),
            ]);
    }
}
