<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolProfileResource\Pages;
use App\Models\SchoolProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SchoolProfileResource extends Resource
{
    protected static ?string $model = SchoolProfile::class;
protected static ?string $navigationLabel = 'Profil sekolah';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('school_name')->required()->maxLength(255),
                Forms\Components\TextInput::make('tagline')->maxLength(255),
                Forms\Components\TextInput::make('principal_name')->maxLength(255),
                Forms\Components\FileUpload::make('principal_photo')->image(),
                Forms\Components\FileUpload::make('logo')->image(),
                Forms\Components\Textarea::make('history')->columnSpanFull(),
                Forms\Components\Textarea::make('vision')->columnSpanFull(),
                Forms\Components\Textarea::make('mission')->columnSpanFull(),
                Forms\Components\Textarea::make('address')->columnSpanFull(),
                Forms\Components\TextInput::make('phone')->tel()->maxLength(255),
                Forms\Components\TextInput::make('email')->email()->maxLength(255),
                Forms\Components\Textarea::make('maps_embed')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('school_name')->searchable(),
                Tables\Columns\TextColumn::make('principal_name')->searchable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchoolProfiles::route('/'),
            'create' => Pages\CreateSchoolProfile::route('/create'),
            'edit' => Pages\EditSchoolProfile::route('/{record}/edit'),
        ];
    }
}
