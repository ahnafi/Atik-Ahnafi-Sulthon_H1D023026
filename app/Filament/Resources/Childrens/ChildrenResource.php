<?php

namespace App\Filament\Resources\Childrens;

use App\Filament\Resources\Childrens\Pages\CreateChildren;
use App\Filament\Resources\Childrens\Pages\EditChildren;
use App\Filament\Resources\Childrens\Pages\ListChildrens;
use App\Filament\Resources\Childrens\Schemas\ChildrenForm;
use App\Filament\Resources\Childrens\Tables\ChildrensTable;
use App\Models\Children;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChildrenResource extends Resource
{
    protected static ?string $model = Children::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ChildrenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChildrensTable::configure($table);
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
            'index' => ListChildrens::route('/'),
            'create' => CreateChildren::route('/create'),
            'edit' => EditChildren::route('/{record}/edit'),
        ];
    }
}
