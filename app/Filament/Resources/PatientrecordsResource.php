<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Patientrecords;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PatientrecordsResource\Pages;
use App\Filament\Resources\PatientrecordsResource\RelationManagers;

class PatientrecordsResource extends Resource
{
    protected static ?string $model = Patientrecords::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'Patient';

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
                    Select::make('department_id')
                    ->relationship('department', 'name')->required(),
                    Select::make('labreport_id')
                    ->relationship('labreport', 'report')->required(),
                    Textarea::make('Diagnosis')->required(),                    
                    Textarea::make('Prescription')->required()                  
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
                TextColumn::make('department.name')->sortable()->searchable(),
                TextColumn::make('Diagnosis')->searchable(),
                TextColumn::make('labreport.report'),
                TextColumn::make('Prescription')->searchable(),
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
            'index' => Pages\ListPatientrecords::route('/'),
            'create' => Pages\CreatePatientrecords::route('/create'),
            'edit' => Pages\EditPatientrecords::route('/{record}/edit'),
        ];
    }    
}
