<?php

namespace App\Filament\RelationManagers;

use App\Models\Combination;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Unique;

abstract class AbstractCombinationsRelationManager extends HasManyRelationManager
{
    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('firstCorePowerId')
                    ->name('first_core_power_id')
                    ->unique(
                        ignorable: fn(?Model $record): ?Model => $record,
                        callback: function (Unique $rule) {
                            $combination = func_get_arg(5);

                            return $rule->where('second_core_power_id', $combination->second_core_power_id);
                        },
                    )
                    ->required()
                    ->searchable()
                    ->relationship('firstCorePower', 'display_name'),
                Forms\Components\BelongsToSelect::make('secondCorePowerId')
                    ->name('second_core_power_id')
                    ->unique(
                        ignorable: fn(?Model $record): ?Model => $record,
                        callback: function (Unique $rule) {
                            $combination = func_get_arg(5);

                            return $rule->where('first_core_power_id', $combination->first_core_power_id);
                        },
                    )
                    ->required()
                    ->searchable()
                    ->relationship('secondCorePower', 'display_name'),

                Forms\Components\BelongsToSelect::make('firstSupportPowerId')
                    ->searchable()
                    ->relationship('firstSupportPower', 'display_name'),
                Forms\Components\BelongsToSelect::make('secondSupportPowerId')
                    ->searchable()
                    ->relationship('secondSupportPower', 'display_name'),

                Forms\Components\BelongsToSelect::make('firstSupportPowerId2')
                    ->searchable()
                    ->relationship('firstSupportPower2', 'display_name'),
                Forms\Components\BelongsToSelect::make('secondSupportPowerId2')
                    ->searchable()
                    ->relationship('secondSupportPower2', 'display_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('firstCorePower.display_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('secondCorePower.display_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('firstSupportPower.display_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('secondSupportPower.display_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('firstSupportPower2.display_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('secondSupportPower2.display_name')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ]);
    }
}
