<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Vaccine;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VaccineResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VaccineResource\RelationManagers;

class VaccineResource extends Resource
{
    protected static ?string $model = Vaccine::class;
    protected static ?string $navigationGroup = 'System Setting';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('employee_id')->relationship('Employee', 'first_name'),
                Forms\Components\TextInput::make('vaccine')->datalist(['covid-19 dose 1','covid-19 dose 2','covid-19 dose 3','covid-19 dose 4','covid-19 dose 5']),
                //Forms\Components\TextInput::make('vaccine')->required(),
                Forms\Components\TextInput::make('product_name')->required(),
                Forms\Components\DatePicker::make('date')->required(),
                Forms\Components\TextInput::make('healthcare_professional')->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    Tables\Columns\TextColumn::make('employee.first_name')->sortable()->searchable()->toggleable(),
                    Tables\Columns\TextColumn::make('vaccine')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('zip_code')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('product_name')->sortable()->searchable()->toggleable(),
                    Tables\Columns\TextColumn::make('date')->sortable()->searchable()->toggleable(),
                    Tables\Columns\TextColumn::make('healthcare_professional')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListVaccines::route('/'),
            'create' => Pages\CreateVaccine::route('/create'),
            'view' => Pages\ViewVaccine::route('/{record}'),
            'edit' => Pages\EditVaccine::route('/{record}/edit'),
        ];
    }
}
