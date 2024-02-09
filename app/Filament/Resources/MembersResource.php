<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembersResource\Pages;
use App\Filament\Resources\MembersResource\RelationManagers;
use App\Models\Members;
use App\Models\AgeGroup;
use App\Models\Disciple;
use App\Models\Process;
use App\Models\MemberStatus;
use App\Models\Tribe;
use App\Models\Team;


use Filament\Forms\Get;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;

class MembersResource extends Resource
{
    protected static ?string $model = Members::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Basic Info')
                ->schema([
                    Forms\Components\TextInput::make('fname')
                    ->label('First name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('mname')
                    ->label('Middle name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('lname')
                        ->label('Last Name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('dob')
                    ->label('Date of Birth')
                        ->required(),
                    Forms\Components\Select::make('gender')
                    ->label('Gender')
                    ->options([
                        'Male' => 'Male',
                        'Female' => 'Female',
                    ]),
                    Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                    Forms\Components\Select::make('marital_status')
                    ->label('Marital Status')
                    ->options([
                        'Single' => 'Single',
                        'Married' => 'Married',
                        'Widowed' => 'Widowed',
                    ]),
                    Forms\Components\TextInput::make('address')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('contact_number')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('FB_account')
                        ->label('Facebook Account')
                        ->required()
                        ->maxLength(255),
                ])->columns(3),

                Fieldset::make('Service')
                ->schema([
                    Forms\Components\DatePicker::make('date_invited')
                    ->required(),
                Forms\Components\Select::make('invited_from')
                    ->label('Invited From')
                    ->options([
                        'Prayer Works' => 'Prayer Works',
                        'Youth Gig Fellowship' => 'Youth Gig Fellowship',
                        'Sunday Service' => 'Sunday Service',
                        'Community' => 'Community',
                        'Campus' => 'Campus',
                        'Workplace' => 'Workplace',
                        'Lifegroup' => 'Lifegroup',
                    ]),
                ]),
                Fieldset::make("Disciple's Status ")
                ->schema([
                    Forms\Components\Select::make('disciple_id')
                    ->label('Type of Disciple')
                    ->options(Disciple::all()->pluck('name', 'id'))
                    ->searchable(),

                    Forms\Components\Select::make('process_id')
                    ->label('Process')
                    ->options(process::all()->pluck('name', 'id'))
                    ->searchable(),

                    Forms\Components\Select::make('status_id')
                    ->label('Member Status')
                    ->default(3)
                    ->options(MemberStatus::all()->pluck('name', 'id'))
                    ->searchable(),

                    Forms\Components\Select::make('tribe_id')
                    ->label('Tribe')
                    ->options(Tribe::all()->pluck('name', 'id'))
                    ->searchable(),
                ]),
                Fieldset::make("Disciple's Status ")
                ->schema([
                    Forms\Components\Select::make('age_group_id')
                    ->label('Age Group')
                    ->options(AgeGroup::all()->pluck('name', 'id'))
                    ->live()
                    ->required()
                    ->default(1)
                    ->searchable(),
                    Forms\Components\Select::make('team_id')
                    ->label('Team')
                    ->hidden(fn (Get $get) => $get('age_group_id') == 1 || $get('age_group_id') == 2)
                    ->options(Team::all()->pluck('name', 'id'))
                    ->live()
                    ->searchable(),
                    Forms\Components\TextInput::make('grade_level')
                    ->hidden()
                    ->hidden(fn (Get $get) => $get('age_group_id') == 1 || $get('age_group_id') == 2)
                    ->maxLength(255),
                    Forms\Components\TextInput::make('campus_name')
                    ->hidden()
                    ->hidden(fn (Get $get) => $get('age_group_id') == 2 || $get('age_group_id') == 3)
                    ->maxLength(255),
                    Forms\Components\TextInput::make('grade_level/course')
                    ->hidden(fn (Get $get) => $get('age_group_id') == 2 || $get('age_group_id') == 3)
                    ->maxLength(255),
                    Forms\Components\TextInput::make('company')
                    ->hidden(fn (Get $get) => $get('age_group_id') == 1 || $get('age_group_id') == 3)
                    ->maxLength(255),
                    Forms\Components\TextInput::make('occupation')
                    ->hidden(fn (Get $get) => $get('age_group_id') == 1 || $get('age_group_id') == 3)
                    ->maxLength(255),
                ])->columns(3),
                
               
         
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disciple.name')
                    ->label('Identified As')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status.name')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Active' => 'success',
                        'Inactive' => 'danger',
                        'New' => 'warning',
                    })
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('process.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dob')
                    ->label('Birth Date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('age'), 
                Tables\Columns\TextColumn::make('marital_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tribe.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FB_account')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_invited')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('invited_from')
                    ->searchable(),
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
                Tables\Actions\ViewAction::make(),

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
            RelationManagers\JourneyRelationManager::class,
            RelationManagers\MdjRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMembers::route('/create'),
            'edit' => Pages\EditMembers::route('/{record}/edit'),
            'view' => Pages\ViewMember::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder 
    {
        $query = parent::getEloquentQuery();

        if (Auth::check() && Auth::user()->hasRole('super_admin')) {
            // The user has the admin role
        } else {
            $query->where('tribe_id', auth()->user()->tribe_id);
        }
        return $query;
    }
}
