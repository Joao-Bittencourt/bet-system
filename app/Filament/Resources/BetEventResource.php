<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BetEventResource\Pages;
use App\Filament\Resources\BetEventResource\RelationManagers;
use App\Models\BetEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class BetEventResource extends Resource
{
    protected static ?string $model = BetEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    public static function form(Form $form): Form
    {
       
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Evento')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('created_by')
                    ->numeric()
                    ->default(Auth::id())
                    ->required()
                    
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
            'index' => Pages\ListBetEvents::route('/'),
            'create' => Pages\CreateBetEvent::route('/create'),
            'edit' => Pages\EditBetEvent::route('/{record}/edit'),
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canViewAny(): bool
    {
        return Auth::id() == '1';
    }
}
