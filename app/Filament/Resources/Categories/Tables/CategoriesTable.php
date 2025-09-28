<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->defaultSort('sort','asc')
            ->columns([
                TextColumn::make('name')
                    ->label(__('resource.category.fields.name'))
                    ->searchable(),
                TextColumn::make('slug')
                    ->label(__('resource.category.fields.slug'))
                    ->searchable(),
                TextColumn::make('parent.name')
                    ->label(__('resource.category.fields.parent_category'))
                    ->searchable(),
                TextColumn::make('sort')
                    ->label(__('resource.category.fields.sort'))
                    ->numeric()
                    ->sortable(),
                ToggleColumn::make('status')
                    ->label(__('resource.category.fields.status')),
                TextColumn::make('created_at')
                    ->label(__('resource.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('resource.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make("status")
                        ->label(__('resource.category.actions.toggle'))
                        ->action(function (Collection $records) {
                            foreach ($records as $record) {
                                $record->status = ! $record->status;
                                $record->save();
                            }
                            Notification::make()
                            ->title(__('resource.notifications.success.default_title'))
                            ->body(__('resource.notifications.success.default_body'))
                            ->success()
                            ->send();
                        })
                ]),
            ]);
    }
}
