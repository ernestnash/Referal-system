<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Specimen;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SpecimenResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SpecimenResource\RelationManagers;

class SpecimenResource extends Resource
{
    protected static ?string $model = Specimen::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Lab';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('patient_id')
                    ->relationship('patient', 'name')->required(),
                    Select::make('specimen_type')
                    //->multiple()
                    ->options([
                        'Blood Sample' => 'Blood Sample',
                        'Spatum Sample' => 'Spatum Sample',
                        'Stool Sample' => 'Stool Sample',
                        'Urine Sample' => 'Urine Sample',
                    ])->required()
                    //TextInput::make('contact'),                   
                ])
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('patient.name')->sortable()->searchable(),
                TextColumn::make('specimen_type')->sortable()->searchable(),
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
            'index' => Pages\ListSpecimens::route('/'),
            'create' => Pages\CreateSpecimen::route('/create'),
            'edit' => Pages\EditSpecimen::route('/{record}/edit'),
        ];
    }    
}
