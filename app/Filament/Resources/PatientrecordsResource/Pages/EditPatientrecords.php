<?php

namespace App\Filament\Resources\PatientrecordsResource\Pages;

use App\Filament\Resources\PatientrecordsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatientrecords extends EditRecord
{
    protected static string $resource = PatientrecordsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
