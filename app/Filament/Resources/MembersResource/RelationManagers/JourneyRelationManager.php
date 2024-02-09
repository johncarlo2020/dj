<?php

namespace App\Filament\Resources\MembersResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Module;
use Filament\Tables\Filters\SelectFilter;

class JourneyRelationManager extends RelationManager
{
    protected static string $relationship = 'journey';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('module_id')
                    ->label('Modules')
                    ->options(Module::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('lesson')
                    ->label('Lesson Number')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('module.name')
                    ->label('Module')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lesson')
                    ->label('Lessons')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('module_id')
                ->options(Module::all()->pluck('name', 'id'))
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
