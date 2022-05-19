<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupportPowerResource\Pages;
use App\Filament\Resources\SupportPowerResource\RelationManagers\FirstSupportPower2CombinationsRelationManager;
use App\Filament\Resources\SupportPowerResource\RelationManagers\FirstSupportPowerCombinationsRelationManager;
use App\Filament\Resources\SupportPowerResource\RelationManagers\SecondSupportPower2CombinationsRelationManager;
use App\Filament\Resources\SupportPowerResource\RelationManagers\SecondSupportPowerCombinationsRelationManager;
use App\Models\SupportPower;
use App\Tweekracht\Helpers\PowerColorHelper;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

class SupportPowerResource extends Resource
{
    protected static ?string $model = SupportPower::class;

    protected static ?string $recordTitleAttribute = 'display_name';

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'type',
            'power',
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Type' => $record->type,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->required()
                    ->options(PowerColorHelper::getTypes()),
                Forms\Components\TextInput::make('power')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('power')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options(PowerColorHelper::getTypes()),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FirstSupportPowerCombinationsRelationManager::class,
            SecondSupportPowerCombinationsRelationManager::class,
            FirstSupportPower2CombinationsRelationManager::class,
            SecondSupportPower2CombinationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupportPowers::route('/'),
            'create' => Pages\CreateSupportPower::route('/create'),
            'edit' => Pages\EditSupportPower::route('/{record}/edit'),
        ];
    }
}
