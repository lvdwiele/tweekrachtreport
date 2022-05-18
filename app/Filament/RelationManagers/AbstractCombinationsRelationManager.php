<?php

namespace App\Filament\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

abstract class AbstractCombinationsRelationManager extends HasManyRelationManager
{
    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('firstCorePowerId')
                    ->relationship('firstCorePower', 'display_name'),
                Forms\Components\BelongsToSelect::make('secondCorePowerId')
                    ->relationship('secondCorePower', 'display_name'),
                Forms\Components\BelongsToSelect::make('firstSupportPowerId')
                    ->relationship('firstSupportPower', 'display_name'),
                Forms\Components\BelongsToSelect::make('secondSupportPowerId')
                    ->relationship('secondSupportPower', 'display_name'),
                Forms\Components\BelongsToSelect::make('firstSupportPowerId2')
                    ->relationship('firstSupportPower2', 'display_name'),
                Forms\Components\BelongsToSelect::make('secondSupportPowerId2')
                    ->relationship('secondSupportPower2', 'display_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('firstCorePower.display_name'),
                Tables\Columns\TextColumn::make('secondCorePower.display_name'),
                Tables\Columns\TextColumn::make('firstSupportPower.display_name'),
                Tables\Columns\TextColumn::make('secondSupportPower.display_name'),
                Tables\Columns\TextColumn::make('firstSupportPower2.display_name'),
                Tables\Columns\TextColumn::make('secondSupportPower2.display_name'),
            ])
            ->filters([
                //
            ]);
    }
}
