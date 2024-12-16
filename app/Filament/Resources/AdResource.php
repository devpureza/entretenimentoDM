<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdResource\Pages;
use App\Filament\Resources\AdResource\RelationManagers;
use App\Models\Ad;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rule;

class AdResource extends Resource
{
    protected static ?string $model = Ad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->label('Título')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('image')
                ->label('Imagem do Anúncio')
                ->directory('ads') // Diretório onde os arquivos serão salvos
                ->image() // Apenas arquivos de imagem
                ->required(),

            Forms\Components\TextInput::make('link')
                ->label('Link do Anúncio')
                ->url() // Validação para URLs
                ->required(),

            Forms\Components\Select::make('size')
                ->label('Tamanho')
                ->options([
                    '300x300' => '300x300',
                    '790x150' => '790x150',
                    '728x90' => '728x90',
                    '970x150' => '970x150'
                ])
                ->required(),

            Forms\Components\DatePicker::make('start_date')
                ->label('Data de Início')
                ->required(),

            Forms\Components\DatePicker::make('end_date')
                ->label('Data de Término')
                ->required(),

            Forms\Components\Select::make('position')
                ->label('Posição')
                ->options([
                    'Superior' => 'Superior',
                    'Ultimas' => 'Últimas Notícias',
                    'Todas noticias' => 'Todas as Notícias',
                    'Superior-Interno' => 'Superior Interno',
                    'Antes do conteudo' => 'Antes do Conteúdo',
                ])
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')->label('Título'),
            Tables\Columns\ImageColumn::make('image')->label('Imagem'),
            Tables\Columns\TextColumn::make('link')->label('Link'),
            Tables\Columns\TextColumn::make('position')->label('Posição'),
            Tables\Columns\TextColumn::make('start_date')->label('Data de Início'),
            Tables\Columns\TextColumn::make('end_date')->label('Data de Término'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAds::route('/'),
            'create' => Pages\CreateAd::route('/create'),
            'edit' => Pages\EditAd::route('/{record}/edit'),
        ];
    }
}
