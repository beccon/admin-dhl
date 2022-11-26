<?php

namespace App\Filament\Resources\ProjetoResource\Pages;

use App\Filament\Resources\ProjetoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjeto extends EditRecord
{
    protected static string $resource = ProjetoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
