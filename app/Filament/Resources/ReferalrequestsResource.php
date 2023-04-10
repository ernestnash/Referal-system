<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Referalrequests;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReferalrequestsResource\Pages;
use App\Filament\Resources\ReferalrequestsResource\RelationManagers;

class ReferalrequestsResource extends Resource
{
    protected static ?string $model = Referalrequests::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('patient_id')
                    ->relationship('patient', 'name')->required(),
                    Select::make('physician_id')
                    ->relationship('physician', 'name')->required(),
                    Select::make('Referal-type')
                    ->options([
                        'Client Referal' => 'Client Referal',
                        'Specimen Referal' => 'Specimen Referal',
                        'Client Parameter Referal' => 'Client Parameter Referal'
                    ])->required(),
                    Select::make('specimen_id')
                    ->relationship('specimen', 'specimen_type')->required(),
                    Select::make('patientrecords_id')
                    ->relationship('patientrecords', 'Diagnosis')->required(),
                    Textarea::make('Destination')->required()                
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
                TextColumn::make('physician.name')->sortable()->searchable(),
                TextColumn::make('Referal-type')->sortable()->searchable(),
                TextColumn::make('specimen.specimen_type')->searchable(),
                TextColumn::make('patientrecords.Diagnosis'),
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
            'index' => Pages\ListReferalrequests::route('/'),
            'create' => Pages\CreateReferalrequests::route('/create'),
            'edit' => Pages\EditReferalrequests::route('/{record}/edit'),
        ];
    }    
}
