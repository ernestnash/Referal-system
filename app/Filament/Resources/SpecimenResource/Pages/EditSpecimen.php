<?php

namespace App\Filament\Resources\SpecimenResource\Pages;

use App\Filament\Resources\SpecimenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpecimen extends EditRecord
{
    protected static string $resource = SpecimenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
