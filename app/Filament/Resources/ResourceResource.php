<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResourceResource\Pages;
use App\Filament\Resources\ResourceResource\RelationManagers;
use App\Models\Resource as ResourceModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResourceResource extends Resource
{
    protected static ?string $model = ResourceModel::class;

    protected static ?string $navigationGroup = 'Resource Management';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255),
                Forms\Components\Textarea::make('contact_info')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('is_active')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('min_booking_duration')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('max_booking_duration')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('unit_cost')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0.00),
                Forms\Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(255)
                    ->default('THB'),
                Forms\Components\TextInput::make('max_participants')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('min_notice_duration')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('max_notice_duration')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Select::make('schedule_id')
                    ->required()
                    ->relationship('schedule', 'name'),
                Forms\Components\TextInput::make('requires_approval')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_booking_duration')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_booking_duration')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unit_cost')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('max_participants')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_notice_duration')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_notice_duration')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('schedule_id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('requires_approval')
                    ->label('Requires Approval')
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
                Tables\Filters\SelectFilter::make('schedule_id')
                    ->relationship('schedule', 'name'),
                Tables\Filters\SelectFilter::make('is_active')
                    ->options([
                        0 => 'No', 
                        1 => 'Yes',
                    ])
                    ->label('Active')
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageResources::route('/'),
        ];
    }
}
