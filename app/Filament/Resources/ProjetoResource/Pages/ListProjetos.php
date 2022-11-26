<?php

namespace App\Filament\Resources\ProjetoResource\Pages;

use App\Filament\Resources\ProjetoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjetos extends ListRecords
{
    protected static string $resource = ProjetoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
