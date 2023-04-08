<?php

namespace App\Filament\Resources\SpecimenResource\Pages;

use App\Filament\Resources\SpecimenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpecimens extends ListRecords
{
    protected static string $resource = SpecimenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
