<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Designation;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DesignationResource\Pages;
use App\Filament\Resources\DesignationResource\RelationManagers;

class DesignationResource extends Resource
{
    protected static ?string $model = Designation::class;
    protected static ?string $navigationGroup = 'System Setting';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('department_id')->relationship('department', 'name'),
                Forms\Components\TextInput::make('name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('department.name')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable()->toggleable(),
                //
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
            'index' => Pages\ListDesignations::route('/'),
            'create' => Pages\CreateDesignation::route('/create'),
            'edit' => Pages\EditDesignation::route('/{record}/edit'),
        ];
    }
}
