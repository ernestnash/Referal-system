<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Physician;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PhysicianResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PhysicianResource\RelationManagers;
use App\Models\department;
use App\Models\specialty;
use Nette\Utils\Callback;

class PhysicianResource extends Resource
{
    protected static ?string $model = Physician::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('name')->required(),
                    Select::make('gender')
                        ->options([
                            'M' => 'Male',
                            'F' => 'Female',
                    ])->required(),
                    TextInput::make('contact')->required(),
                    Select::make('department_id')
                        ->label('department')
                        ->options(department::all()->pluck('name', 'id')->toArray())
                        ->reactive()
                        ->afterStateUpdated(fn (callable $set)=> $set('specialty_id', null))->required(),
                    Select::make('specialty_id')
                        ->label('specialty')
                        ->options(function(callable $get){
                            $department = department::find($get('department_id'));
                            if(!$department) {
                                return specialty::all()->pluck('name', 'id');
                            }
                            return $department->specialty->pluck('name', 'id'); 
                        })->required()               
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
                TextColumn::make('department.name')->sortable()->searchable(),
                TextColumn::make('specialty.name')->sortable()->searchable(),
                //TextColumn::make('contact'),
                TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                SelectFilter::make('department')->relationship('department', 'name')
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
            'index' => Pages\ListPhysicians::route('/'),
            'create' => Pages\CreatePhysician::route('/create'),
            'edit' => Pages\EditPhysician::route('/{record}/edit'),
        ];
    }    
}
