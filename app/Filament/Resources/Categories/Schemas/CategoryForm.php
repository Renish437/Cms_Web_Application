<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Section::make('Categories')
               ->columns(2)
               ->schema([
                 TextInput::make('name')
                 ->label(__('resource.category.fields.name'))
                    ->required()
                    ->live(onBlur:true)
                    ->afterStateUpdated(fn(Set $set, string $state)=>$set('slug',Str::slug($state))),
                TextInput::make('slug')
                   ->label(__('resource.category.fields.slug'))
                    ->required()
                    ->disabled()
                    ->reactive()
                    ->dehydrated(),
                Select::make('parent_id')
                ->label(__('resource.category.fields.parent_category'))
                    ->relationship('parent', 'name'),
                TextInput::make('sort')
                    ->label(__('resource.category.fields.sort'))
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('status')
                  ->label(__('resource.category.fields.status'))
                    ->required(),
                Textarea::make('description')
                ->label(__('resource.category.fields.description'))
                    ->columnSpanFull(),
               ])->columnSpanFull()
            ]);
    }
}
