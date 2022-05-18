<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CorePowerResource\Pages;
use App\Filament\Resources\CorePowerResource\RelationManagers\FirstCorePowerCombinationsRelationManager;
use App\Filament\Resources\CorePowerResource\RelationManagers\SecondCorePowerCombinationsRelationManager;
use App\Models\CorePower;
use App\Tweekracht\Helpers\PowerColorHelper;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

class CorePowerResource extends Resource
{
    protected static ?string $model = CorePower::class;

    protected static ?string $recordTitleAttribute = 'display_name';

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'type',
            'power',
            'card_number',
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Type' => $record->type,
            'Card number' => $record->card_number,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->required()
                    ->options(PowerColorHelper::getTypes()),
                TextInput::make('card_number')
                    ->required()
                    ->maxLength(255)
                    ->numeric()
                    ->minValue(1),
                TextInput::make('power')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('card_number')
                    ->sortable(),
                Tables\Columns\TextColumn::make('power')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options(PowerColorHelper::getTypes()),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FirstCorePowerCombinationsRelationManager::class,
            SecondCorePowerCombinationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCorePowers::route('/'),
            'create' => Pages\CreateCorePower::route('/create'),
            'edit' => Pages\EditCorePower::route('/{record}/edit'),
        ];
    }
}
