<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageVariantResource\Pages;
use App\Filament\Resources\PackageVariantResource\RelationManagers;
use App\Models\PackageVariant;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PackageVariantResource extends Resource
{
    protected static ?string $model = PackageVariant::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?string $activeNavigationIcon = 'heroicon-s-swatch';

    protected static ?string $navigationGroup = 'Product';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('name')
                                ->required()
                                ->live(true)
                                ->unique()
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->disabled()
                                ->dehydrated()
                                ->required()
                                ->unique(),
                            MarkdownEditor::make('facilities')
                                ->columnSpan('full')
                        ])->columns(2)
                    ]),
                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_visible')
                                    ->label('Visibility')
                                    ->helperText('Enable or disable package visibility')
                                    ->default(true),
                                Toggle::make('is_featured')
                                    ->label('Featured')
                                    ->helperText('Make it a featured variant')
                                    ->default(false),
                            ]),
                        Section::make()
                            ->schema([
                                TextInput::make('price')
                                    ->prefix('Rp')
                                    ->required()
                                    ->numeric(),
                                Select::make('package_id')
                                    ->relationship(
                                        "package",
                                        "name"
                                    )
                                    ->native(false)
                                    ->required()
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('package.name')
                    ->searchable()
                    ->sortable()
                    ->label('Main Package'),
                IconColumn::make('is_visible')
                    ->label('Visibility')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('price')
                    ->money('IDR'),
                TextColumn::make('facilities')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->words(10),
            ])
            ->filters([
                SelectFilter::make('package')
                    ->label('Main Package')
                    ->relationship('package', 'name')
                    ->native(false)
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListPackageVariants::route('/'),
            'create' => Pages\CreatePackageVariant::route('/create'),
            'edit' => Pages\EditPackageVariant::route('/{record}/edit'),
        ];
    }
}
