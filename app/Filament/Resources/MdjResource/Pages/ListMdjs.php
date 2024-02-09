<?php

namespace App\Filament\Resources\MdjResource\Pages;

use App\Filament\Resources\MdjResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMdjs extends ListRecords
{
    protected static string $resource = MdjResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
