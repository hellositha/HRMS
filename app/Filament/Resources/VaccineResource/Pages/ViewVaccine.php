<?php

namespace App\Filament\Resources\VaccineResource\Pages;

use App\Filament\Resources\VaccineResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVaccine extends ViewRecord
{
    protected static string $resource = VaccineResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
