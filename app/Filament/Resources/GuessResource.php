<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuessResource\Pages;
use App\Models\Guess;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GuessResource extends Resource
{
    protected static ?string $model = Guess::class;

    protected static ?string $modelLabel = 'Palpite';

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $navigationLabel = 'Palpites';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bet_event_id')
                    ->relationship('bet_events', 'name')
                    ->default('1')
                    ->required()
                    ->label('Evento'),

                Forms\Components\Select::make('created_by')
                    ->options([Auth::id() => Auth::user()->name])
                    ->default('1')
                    ->required()
                    ->label('Palpitero'),
                Forms\Components\TextInput::make('guess')
                    ->label('Palpite')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('value')
                    ->label('Valor (R$)')
                    ->default('2.00')
                    ->readOnly(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListGuesses::route('/'),
            'create' => Pages\CreateGuess::route('/create'),
            'edit' => Pages\EditGuess::route('/{record}/edit'),
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
