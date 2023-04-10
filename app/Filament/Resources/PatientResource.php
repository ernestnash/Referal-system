<?php

namespace App\Filament\Resources;

use Closure;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Patient;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PatientResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PatientResource\RelationManagers;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Fieldset::make('Patient Details')
                        ->schema([
                            TextInput::make('name')->required(),
                            DatePicker::make('date_of_birth')
                                ->required()
                                ->reactive()
                                ->maxDate(now())
                                ->afterStateUpdated(function (Closure $set, $state) {
                                    $set('age', Carbon::parse($state)->age);
                                }),
                            TextInput::make('age')->disabled()->dehydrated(false),
                            Select::make('gender')
                                ->options([
                                    'M' => 'Male',
                                    'F' => 'Female',
                                ]),
                            TextInput::make('county')->required(),
                            TextInput::make('city')->required(),
                            Select::make('identification_method')
                                ->options([
                                    'National ID' => 'National ID',
                                    'Birth Certificate' => 'Birth Certificate',
                                    'Pasport' => 'Passport',
                                    'Alien ID' => 'Alien ID',
                                ])
                                ->required(),
                            TextInput::make('identification_no')->required(),
                            TextInput::make('contact')->required()
                        ]),
                    Fieldset::make('Next Of Kin Details')
                        ->schema([
                            TextInput::make('next_of_kin_name')->required(),
                            Select::make('relationship')
                                ->options([
                                    'Mother' => 'Mother',
                                    'Father' => 'Father',
                                    'Brother' => 'Brother',
                                    'Sister' => 'Sister',
                                    'Husband' => 'Husband',
                                    'Wife' => 'Wife',
                                    'Son' => 'Son',
                                    'Daughter' => 'Daughter',
                                ])->required(),
                            TextInput::make('kin_contact')->required(),
                            TextInput::make('alternative_contact')->required()
                        ])
                
                ])
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('age')->sortable(),
                TextColumn::make('date_of_birth')->sortable(),
                TextColumn::make('gender')->sortable(),
                TextColumn::make('city')->sortable(),
                TextColumn::make('county')->sortable()->searchable(),
                TextColumn::make('identification_method'),
                TextColumn::make('identification_number'),
                TextColumn::make('contact'),
                TextColumn::make('next_of_kin_name'),
                TextColumn::make('relationship'),
                TextColumn::make('kin_contact'),
                TextColumn::make('alternative_contact'),
                TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }    
}
