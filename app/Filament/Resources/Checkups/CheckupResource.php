<?php

namespace App\Filament\Resources\Checkups;

use App\Filament\Resources\Checkups\Pages\CreateCheckup;
use App\Filament\Resources\Checkups\Pages\EditCheckup;
use App\Filament\Resources\Checkups\Pages\ListCheckups;
use App\Filament\Resources\Checkups\Schemas\CheckupForm;
use App\Filament\Resources\Checkups\Tables\CheckupsTable;
use App\Models\Checkup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CheckupResource extends Resource
{
    protected static ?string $model = Checkup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    public static function form(Schema $schema): Schema
    {
        return CheckupForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CheckupsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCheckups::route('/'),
            'create' => CreateCheckup::route('/create'),
            'edit' => EditCheckup::route('/{record}/edit'),
        ];
    }
}
