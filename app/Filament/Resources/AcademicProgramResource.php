<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicProgramResource\Pages;
use App\Models\AcademicProgram;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AcademicProgramResource extends Resource
{
    protected static ?string $model = AcademicProgram::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\Textarea::make('description')->columnSpanFull(),
                Forms\Components\FileUpload::make('cover')->image(),
                Forms\Components\Select::make('is_active')->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('cover'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('is_active')->badge(),
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
            'index' => Pages\ListAcademicPrograms::route('/'),
            'create' => Pages\CreateAcademicProgram::route('/create'),
            'edit' => Pages\EditAcademicProgram::route('/{record}/edit'),
        ];
    }
}
