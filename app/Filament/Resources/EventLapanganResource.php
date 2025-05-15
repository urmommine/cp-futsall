<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventLapanganResource\Pages;
use App\Filament\Resources\EventLapanganResource\RelationManagers;
use App\Models\EventLapangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventLapanganResource extends Resource
{
    protected static ?string $model = EventLapangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_organizer')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_event')
                    ->required(),
                Forms\Components\FileUpload::make('gambar_event')
                    ->image()
                    ->directory('event'),
                Forms\Components\Textarea::make('deskripsi_event')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_organizer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_event')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deskripsi_event')
                    ,
                Tables\Columns\ImageColumn::make('gambar_event')
                   ,
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
            'index' => Pages\ListEventLapangans::route('/'),
            'create' => Pages\CreateEventLapangan::route('/create'),
            'edit' => Pages\EditEventLapangan::route('/{record}/edit'),
        ];
    }
}
