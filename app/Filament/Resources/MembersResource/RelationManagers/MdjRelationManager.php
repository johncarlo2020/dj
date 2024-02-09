<?php

namespace App\Filament\Resources\MembersResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;

class MdjRelationManager extends RelationManager
{
    protected static string $relationship = 'MembersDiscipleshipJourney';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('life Retreat')
                ->schema([
                    Forms\Components\DatePicker::make('Life_Retreat')
                    ->label('Life Retreat Date')
                    ->required(),
                Forms\Components\DatePicker::make('Life_Tract')
                    ->label('Life Tract Date')
                    ->required(),
                Forms\Components\TextInput::make('Life_Retreat_Batch')
                    ->label('Life Retreat Batch ')
                    ->required(),
                Forms\Components\DatePicker::make('Water_Baptism')
                    ->label('Water Baptism Date')
                    ->required(),
                ])->columns(3),
                Fieldset::make('Schooling')
                ->schema([
                    Fieldset::make('Foundation Class')
                    ->schema([
                        Forms\Components\DatePicker::make('FC_Date_Enrolled')
                        ->label('Foundation Class Date Enrolled')
                        ->required(),
                    Forms\Components\DatePicker::make('FC_Date_Graduated')
                        ->label('Foundation Class Date Graduated')
                        ->required(),
                    ])->columns(2),
                    Fieldset::make('Make Disciple')
                    ->schema([
                        Forms\Components\DatePicker::make('MD_Date_Enrolled')
                        ->label('Make Disciple Class Date Enrolled')
                        ->required(),
                    Forms\Components\DatePicker::make('MD_Date_Graduated')
                        ->label('Make Disciple Class Date Graduated')
                        ->required(),
                    ])->columns(2),
                    Fieldset::make('Life Group Class')
                    ->schema([
                        Forms\Components\DatePicker::make('LGC_Date_Enrolled')
                        ->label('Life Group Class Date Enrolled')
                        ->required(),
                    Forms\Components\DatePicker::make('LGC_Date_Graduated')
                        ->label('Life Group Class Date Graduated')
                        ->required(),
                    ])->columns(2),
                    Fieldset::make('Kainos')
                    ->schema([
                        Forms\Components\DatePicker::make('Kainos_Date_Enrolled')
                        ->label('Kainos Date Enrolled')
                        ->required(),
                    Forms\Components\DatePicker::make('Kainos_Date_Graduated')
                        ->label('Kainos Date Graduated')
                        ->required(),
                    ])->columns(2),
                ]),   
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('Life_Retreat')
                ->label('Life Retreat Date'),
                Tables\Columns\TextColumn::make('Life_Retreat_Batch')
                ->label('Life Retreat batch'),
                Tables\Columns\TextColumn::make('Life_Tract')                
                ->label('Life Tract Date'),
                Tables\Columns\TextColumn::make('Water_Baptism')
                ->label('Water Baptism Date'),
                Tables\Columns\TextColumn::make('FC_Date_Enrolled')                
                ->label('FC Date Enrolled'),
                Tables\Columns\TextColumn::make('FC_Date_Graduated')
                ->label('FC Date Graduated'),
                Tables\Columns\TextColumn::make('MD_Date_Enrolled')
                ->label('MD Date Enrolled'),
                Tables\Columns\TextColumn::make('MD_Date_Graduated')
                ->label('MD Date Graduated'),
                Tables\Columns\TextColumn::make('LGC_Date_Enrolled')                
                ->label('LGC Date Enrolled'),
                Tables\Columns\TextColumn::make('LGC_Date_Graduated')
                ->label('LGC Date Graduated'),
                Tables\Columns\TextColumn::make('Kainos_Date_Enrolled')
                ->label('Kainos Date Enrolled'),
                Tables\Columns\TextColumn::make('Kainos_Date_Graduated')
                ->label('Kainos Date Graduated'),
                
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
