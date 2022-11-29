<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Empresa;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use App\Filament\Resources\EmpresaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmpresaResource\RelationManagers;
use App\Filament\Resources\EmpresaResource\RelationManagers\UsersRelationManager;
use App\Filament\Resources\EmpresaResource\RelationManagers\ProjetosRelationManager;

class EmpresaResource extends Resource
{
    protected static ?string $model = Empresa::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\TextInput::make('nome')
                        ->required()
                        ->unique(Empresa::class, ignorable: fn ($record) => $record)
                        ->maxLength(255),
                    Forms\Components\TextInput::make('cnpj')
                        ->required()
                        ->unique(Empresa::class, ignorable: fn ($record) => $record)
                        ->maxLength(18)
                        ->mask(fn (Mask $mask) => $mask->pattern('000.000.000\\\000-00')),
                    Forms\Components\TextInput::make('endereco')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('responsavel_nome')
                        ->label('Responsável')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('responsavel_telefone')
                        ->label('Telefone')
                        ->required()
                        ->unique(Empresa::class, ignorable: fn ($record) => $record)
                        ->maxLength(255),


                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')->searchable(),
                Tables\Columns\TextColumn::make('cnpj')->searchable(),
                Tables\Columns\TextColumn::make('endereco')->searchable(),
                Tables\Columns\TextColumn::make('responsavel_nome')->searchable()->label('Responsável'),
                Tables\Columns\TextColumn::make('responsavel_telefone')->searchable()->label('Telefone'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ProjetosRelationManager::class,
            UsersRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmpresas::route('/'),
            'create' => Pages\CreateEmpresa::route('/create'),
            'edit' => Pages\EditEmpresa::route('/{record}/edit'),
        ];
    }

}
