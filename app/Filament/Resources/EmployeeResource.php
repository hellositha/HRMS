<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Employee;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Card::make()->columns(2)->schema([
                        Select::make('country_id')->relationship('country', 'name')->required(),
                        Select::make('state_id')->relationship('state', 'name'),
                        Select::make('city_id')->relationship('city', 'name'),
                        Select::make('department_id')->relationship('department', 'name'),
                        Forms\Components\TextInput::make('vaccine')->datalist(['covid-19 dose 1','covid-19 dose 2','covid-19 dose 3','covid-19 dose 4','covid-19 dose 5']),
                    //    Select::make('vaccine_id')->relationship('vaccine', 'vaccine'),
                  //      Forms\Components\TextInput::make('vaccine_id')->datalist(['covid-19 dose 1','covid-19 dose 2','covid-19 dose 3','covid-19 dose 4','covid-19 dose 5']),
                        Forms\Components\TextInput::make('first_name'),
                        Forms\Components\TextInput::make('last_name'),
                        Select::make('designation_id')->relationship('designation', 'name'),
                        Forms\Components\TextInput::make('address'),
                        Forms\Components\TextInput::make('zip_code'),
                        Forms\Components\DatePicker::make('birth_date'),
                        Forms\Components\DatePicker::make('date_hired')
                ])

                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('id'),
                    Tables\Columns\TextColumn::make('first_name')->sortable()->searchable()->toggleable(),
                    Tables\Columns\TextColumn::make('last_name')->sortable()->searchable()->toggleable(),
                    Tables\Columns\TextColumn::make('department.name')->sortable()->searchable()->toggleable(),
                    Tables\Columns\TextColumn::make('address')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('zip_code')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('birth_date')->sortable()->searchable()->toggleable(),
                    Tables\Columns\TextColumn::make('date_hired')->sortable()->searchable()->toggleable(),
                    Tables\Columns\TextColumn::make('country.name')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('state.name')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('city.name')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('vaccine')->sortable()->searchable()->toggleable(),


                ])
                ->filters([


                ])

                ->actions([
                    Tables\Actions\ActionGroup::make([
                  //  Tables\Actions\Action::make('activate')->action(fn (Employee $record) => $record->activate())
                   // ->requiresConfirmation()->color('success'),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    ])
                ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEmployees::route('/'),
        ];
    }
}
