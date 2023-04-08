<?php

namespace App\Filament\Resources\LabtechResource\Pages;

use App\Filament\Resources\LabtechResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLabtech extends EditRecord
{
    protected static string $resource = LabtechResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
