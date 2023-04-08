<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Labreport;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LabreportResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LabreportResource\RelationManagers;
use Filament\Forms\Components\Textarea;

class LabreportResource extends Resource
{
    protected static ?string $model = Labreport::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('patient_Id')
                    ->relationship('patient', 'name'),
                    Select::make('physician_Id')
                    ->relationship('physician', 'name'),
                    Select::make('specimen_Id')
                    ->relationship('specimen', 'specimen_type'),
                    Select::make('labtech_Id')
                    ->relationship('labtech', 'name'),
                    Textarea::make('report')                    
                ])
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('patient_id')->sortable()->searchable(),
                TextColumn::make('physician_id')->sortable()->searchable(),
                TextColumn::make('specimen_id')->sortable()->searchable(),
                TextColumn::make('report')->sortable()->searchable(),
                TextColumn::make('labtech_id'),
                TextColumn::make('created_at')->dateTime()
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
            'index' => Pages\ListLabreports::route('/'),
            'create' => Pages\CreateLabreport::route('/create'),
            'edit' => Pages\EditLabreport::route('/{record}/edit'),
        ];
    }    
}
