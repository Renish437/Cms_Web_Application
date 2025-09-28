<?php

namespace App\Filament\Resources\Posts\Pages;

use App\enum\PostType;
use App\Filament\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord
{
        protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = PostType::POST;
        $data['author_id'] =Auth::id();
        return $data;
    }
}
