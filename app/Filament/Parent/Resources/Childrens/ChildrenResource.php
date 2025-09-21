<?php

namespace App\Filament\Parent\Resources\Childrens;

use App\Filament\Parent\Resources\Childrens\Pages\CreateChildren;
use App\Filament\Parent\Resources\Childrens\Pages\EditChildren;
use App\Filament\Parent\Resources\Childrens\Pages\ListChildrens;
use App\Filament\Parent\Resources\Childrens\Schemas\ChildrenForm;
use App\Filament\Parent\Resources\Childrens\Tables\ChildrensTable;
use App\Models\Children;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChildrenResource extends Resource
{
    protected static ?string $model = Children::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;
    protected static ?string $label = 'Data Anak';


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

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

}
