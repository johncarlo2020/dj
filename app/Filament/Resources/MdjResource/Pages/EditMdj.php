<?php

namespace App\Filament\Resources\MdjResource\Pages;

use App\Filament\Resources\MdjResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMdj extends EditRecord
{
    protected static string $resource = MdjResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
