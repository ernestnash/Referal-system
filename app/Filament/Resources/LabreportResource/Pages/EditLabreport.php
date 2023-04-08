<?php

namespace App\Filament\Resources\LabreportResource\Pages;

use App\Filament\Resources\LabreportResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLabreport extends EditRecord
{
    protected static string $resource = LabreportResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
