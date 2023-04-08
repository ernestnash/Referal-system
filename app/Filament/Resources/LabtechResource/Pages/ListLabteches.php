<?php

namespace App\Filament\Resources\LabtechResource\Pages;

use App\Filament\Resources\LabtechResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLabteches extends ListRecords
{
    protected static string $resource = LabtechResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
