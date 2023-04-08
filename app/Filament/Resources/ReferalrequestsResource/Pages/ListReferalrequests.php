<?php

namespace App\Filament\Resources\ReferalrequestsResource\Pages;

use App\Filament\Resources\ReferalrequestsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReferalrequests extends ListRecords
{
    protected static string $resource = ReferalrequestsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
