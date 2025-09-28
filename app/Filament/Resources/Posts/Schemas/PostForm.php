<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\enum\PostStatus;
use App\enum\PostType;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


                Section::make('First')
                    ->schema([
                        Flex::make([


                            TextInput::make('title')
                                ->label(__('resource.post.fields.title'))
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                    $slug = Str::slug($state);
                                    $set('slug', $slug);
                                }),
                            TextInput::make('slug')
                                ->label(__('resource.post.fields.slug'))
                                ->required()
                                ->unique(),

                            Select::make('parent_id')
                                ->relationship('parent', 'title')
                                ->searchable()
                                ->label(__('resource.post.fields.parent_id')),
                            Select::make('type')
                                ->label(__('resource.post.fields.type'))
                                ->required()
                                ->options(PostType::class)
                                ->default(request()->query('type') ?? PostType::PAGE),
                        ])->columnSpanFull(),
                    ])->columnSpanFull(),

                Section::make("First another")
                  
                    ->schema([
                           Textarea::make('excerpt') 
                              ->rows(3)
                            ->label(__('resource.post.fields.excerpt'))
                           ,
                        RichEditor::make('content')
                            ->label(__('resource.post.fields.content'))
                            ->required()
                            
                            ->extraAttributes(['style' => 'min-height: 200px;']), 
                          
                       
                    ])
                    ->columnSpanFull(),
                Flex::make([

                     Section::make('Second')
                        ->schema([



                           Flex::make([
                             Select::make('status')
                                ->label(__('resource.post.fields.status'))
                                ->required()
                                ->options(PostStatus::class)
                                ->default(PostStatus::DRAFT->value),

                            DateTimePicker::make('published_at')
                                ->label(__('resource.post.fields.published_at'))
                                ->default(now())
                                ->required(),
                           ])


                        ]),
                    Section::make("Third")
                        ->schema([
                            Toggle::make('is_featured')
                                ->label(__('resource.post.fields.is_featured'))
                                ->required(),


                            Toggle::make('comment_status')
                                ->label(__('resource.post.fields.comment_status'))
                                ->required(),

                          


                        ]),
                   
                      
                ])->columnSpanFull(),
                  Section::make("Image")
                        ->schema([
                          FileUpload::make('feature_image')
                                ->label(__('resource.post.fields.feature_image'))
                                ->image(),
                        ])->columnSpanFull()
            ]);
    }
}
