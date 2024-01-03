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
                    ->label('Evento')
                    ->native(false),

                Forms\Components\Select::make('created_by')
                    ->options([Auth::id() => Auth::user()->name])
                    ->default(Auth::id())
                    ->required()
                    ->label('Palpitero')
                    ->native(false),
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
                Tables\Columns\TextColumn::make('guess')
                    ->label('Palpite')
                    ->searchable(),
                Tables\Columns\TextColumn::make('users.name')
                    ->label('Palpitero')
                    ->searchable(),
                // ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('guess_status.status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => __($state))
                    ->color(fn (string $state): string => match ($state) {
                        'created' => 'gray',
                        'in_process' => 'warning',
                        'paid' => 'success',
                        'invalid' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('value')
                    ->label('Valor')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return in_array(Auth::id(), [$record->created_by, '1']);
    }

    public static function canView(Model $record): bool
    {
        return in_array(Auth::id(), [$record->created_by, '1']);
    }
}
