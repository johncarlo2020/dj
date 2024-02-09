<?php

namespace App\Filament\Resources\TribeResource\Pages;

use App\Filament\Resources\TribeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTribe extends EditRecord
{
    protected static string $resource = TribeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
