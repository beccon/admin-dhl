<?php

namespace App\Filament\Resources\EmpresaResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'Usuários';

    protected static ?string $recordTitleAttribute = 'empresa_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            TextInput::make('password')
                ->password()
                ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                ->minLength(8)
                ->same('passwordConfirmation')
                ->dehydrated(fn ($state) => filled($state))
                ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
            TextInput::make('passwordConfirmation')
                ->password()
                ->label('Password Confirmation')
                ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                ->minLength(8)
                ->dehydrated(false),
            Select::make('empresa_id')
                ->relationship('empresa', 'nome')
                ->required(),
            Select::make('projeto_id')
                ->multiple()
                ->relationship('projeto', 'nome')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nome'),
                Tables\Columns\TextColumn::make('email'),
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
