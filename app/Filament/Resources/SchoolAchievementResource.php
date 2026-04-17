<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolAchievementResource\Pages;
use App\Models\SchoolAchievement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SchoolAchievementResource extends Resource
{
    protected static ?string $model = SchoolAchievement::class;
protected static ?string $navigationLabel = 'Prestasi Sekolah';
    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->maxLength(255),
                Forms\Components\TextInput::make('level')->maxLength(255),
                Forms\Components\DatePicker::make('achievement_date'),
                Forms\Components\Select::make('is_featured')->options([
                    'featured' => 'Featured',
                    'not_featured' => 'Not Featured',
                ])->required(),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->directory('achievements')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('level'),
                Tables\Columns\TextColumn::make('achievement_date')->date(),
                Tables\Columns\TextColumn::make('is_featured')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'featured' => 'success',
                        'not_featured' => 'gray',
                    }),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchoolAchievements::route('/'),
            'create' => Pages\CreateSchoolAchievement::route('/create'),
            'edit' => Pages\EditSchoolAchievement::route('/{record}/edit'),
        ];
    }
}