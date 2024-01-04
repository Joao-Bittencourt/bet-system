<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuessStatusResource\Pages;
use App\Models\GuessStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class GuessStatusResource extends Resource
{
    protected static ?string $model = GuessStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $modelLabel = 'Aposta status';

    protected static ?string $pluralLabel = 'Aposta status';

    protected static ?string $navigationLabel = 'Aposta status';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Configurations');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('status')
                    ->label('Aposta status')
                    ->maxLength(255)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                    ->label('Aposta status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dt Cadastro')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuessStatuses::route('/'),
            'create' => Pages\CreateGuessStatus::route('/create'),
            'edit' => Pages\EditGuessStatus::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return Auth::id() == '1';
    }
}
