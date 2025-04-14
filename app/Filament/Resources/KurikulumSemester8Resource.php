<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KurikulumSemester8Resource\Pages;
use App\Filament\Resources\KurikulumSemester8Resource\RelationManagers;
use App\Models\KurikulumSemester8;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KurikulumSemester8Resource extends Resource
{
    protected static ?string $model = KurikulumSemester8::class;

    protected static ?string $navigationGroup = 'Akademik';

    protected static ?string $navigationLabel = 'Kurikulum Semester 8';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_mata_kuliah'),
                Forms\Components\TextInput::make('nama_mata_kuliah'),
                Forms\Components\TextInput::make('sks')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_mata_kuliah')
                    ->limit(50),
                Tables\Columns\TextColumn::make('nama_mata_kuliah')
                    ->limit(50),
                Tables\Columns\TextColumn::make('sks')
                    ->limit(50),
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
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKurikulumSemester8s::route('/'),
            'create' => Pages\CreateKurikulumSemester8::route('/create'),
            'view' => Pages\ViewKurikulumSemester8::route('/{record}'),
            'edit' => Pages\EditKurikulumSemester8::route('/{record}/edit'),
        ];
    }
}
