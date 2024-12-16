<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'notícia'; // Singular
    }

    public static function getPluralModelLabel(): string
    {
        return 'notícias'; // Plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Notícias';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('anchor')
                    ->label('Âncora'),
                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->reactive()
                    ->columnSpan(2)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                TextInput::make('subtitle')
                    ->label('Subtítulo')
                    ->columnSpan(2)
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Categoria')
                    ->required(),
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->label('Autor')
                    ->default(auth()->id())
                    ->required(),
                RichEditor::make('content')
                    ->label('Conteúdo')
                    ->required()
                    ->columnSpan(2),
                FileUpload::make('image')
                    ->label('Imagem principal')
                    ->image(),
                DateTimePicker::make('published_at')
                    ->label('Data de publicação')
                    ->default(now()),
                TextInput::make('tags')
                    ->label('Tags (Separados por vírgula)')
                    ->columnSpan(2),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable()->label('Título'),
                TextColumn::make('category.name')->label('Categoria'),
                TextColumn::make('author.name')->label('Autor'),
                ImageColumn::make('image')
                    ->label('Foto')
                    ->url(fn($record): string => asset('storage/' . $record->image)),
                TextColumn::make('published_at')
                    ->label('Data de Publicação')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')->relationship('category', 'name'),
                SelectFilter::make('author')->relationship('author', 'name'),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
