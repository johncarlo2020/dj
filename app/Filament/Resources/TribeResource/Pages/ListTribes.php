<?php

namespace App\Filament\Resources\TribeResource\Pages;

use App\Filament\Resources\TribeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTribes extends ListRecords
{
    protected static string $resource = TribeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
