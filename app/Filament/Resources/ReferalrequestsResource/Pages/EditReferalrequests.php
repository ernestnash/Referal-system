<?php

namespace App\Filament\Resources\ReferalrequestsResource\Pages;

use App\Filament\Resources\ReferalrequestsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReferalrequests extends EditRecord
{
    protected static string $resource = ReferalrequestsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
