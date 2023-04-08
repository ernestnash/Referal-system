<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LabtechResource\Pages;
use App\Filament\Resources\LabtechResource\RelationManagers;
use App\Models\Labtech;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LabtechResource extends Resource
{
    protected static ?string $model = Labtech::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLabteches::route('/'),
            'create' => Pages\CreateLabtech::route('/create'),
            'edit' => Pages\EditLabtech::route('/{record}/edit'),
        ];
    }    
}
