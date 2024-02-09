<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MdjResource\Pages;
use App\Filament\Resources\MdjResource\RelationManagers;
use App\Models\Mdj;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MdjResource extends Resource
{
    protected static ?string $model = Mdj::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('members_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('Life_Tract')
                    ->required(),
                Forms\Components\DatePicker::make('Life_Retreat')
                    ->required(),
                Forms\Components\TextInput::make('Life_Retreat_Batch')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('Water_Baptism')
                    ->required(),
                Forms\Components\DatePicker::make('FC_Date_Enrolled')
                    ->required(),
                Forms\Components\DatePicker::make('FC_Date_Graduated')
                    ->required(),
                Forms\Components\DatePicker::make('MD_Date_Enrolled')
                    ->required(),
                Forms\Components\DatePicker::make('MD_Date_Graduated')
                    ->required(),
                Forms\Components\DatePicker::make('LGC_Date_Enrolled')
                    ->required(),
                Forms\Components\DatePicker::make('LGC_Date_Graduated')
                    ->required(),
                Forms\Components\DatePicker::make('Kainos_Date_Enrolled')
                    ->required(),
                Forms\Components\DatePicker::make('Kainos_Date_Graduated')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('members.fullName')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Life_Tract')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Life_Retreat')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Life_Retreat_Batch')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Water_Baptism')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FC_Date_Enrolled')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FC_Date_Graduated')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('MD_Date_Enrolled')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('MD_Date_Graduated')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('LGC_Date_Enrolled')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('LGC_Date_Graduated')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Kainos_Date_Enrolled')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Kainos_Date_Graduated')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListMdjs::route('/'),
            'create' => Pages\CreateMdj::route('/create'),
            'edit' => Pages\EditMdj::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder 
    {
        $query = parent::getEloquentQuery();

        if (Auth::check() && Auth::user()->hasRole('super_admin')) {
            // The user has the admin role
        } else {
            $query->where('members.tribe_id', auth()->user()->tribe_id);
        }
        return $query;
    }
}
