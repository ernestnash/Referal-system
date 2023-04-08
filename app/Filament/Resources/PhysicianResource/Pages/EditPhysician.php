<?php

namespace App\Filament\Resources\PhysicianResource\Pages;

use App\Filament\Resources\PhysicianResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhysician extends EditRecord
{
    protected static string $resource = PhysicianResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
