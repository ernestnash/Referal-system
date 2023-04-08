<?php

namespace App\Filament\Resources\SpecialtyResource\Pages;

use App\Filament\Resources\SpecialtyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpecialties extends ListRecords
{
    protected static string $resource = SpecialtyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
