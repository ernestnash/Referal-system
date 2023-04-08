<?php

namespace App\Filament\Resources\LabreportResource\Pages;

use App\Filament\Resources\LabreportResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLabreports extends ListRecords
{
    protected static string $resource = LabreportResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
