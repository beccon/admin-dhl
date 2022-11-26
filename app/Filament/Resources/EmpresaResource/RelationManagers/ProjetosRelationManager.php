<?php

namespace App\Filament\Resources\EmpresaResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ProjetosRelationManager extends RelationManager
{
    protected static string $relationship = 'projetos';

    protected static ?string $recordTitleAttribute = 'empresa_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                ->required()
                ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
}
