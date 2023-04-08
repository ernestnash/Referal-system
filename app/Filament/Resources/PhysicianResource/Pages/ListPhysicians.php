<?php

namespace App\Filament\Resources\PhysicianResource\Pages;

use App\Filament\Resources\PhysicianResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhysicians extends ListRecords
{
    protected static string $resource = PhysicianResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
