<?php

namespace App\Filament\Resources;

use App\Enums\PackageTypeEnum;
use App\Filament\Resources\HolidayPackageResource\Pages;
use App\Filament\Resources\HolidayPackageResource\RelationManagers;
use App\Models\HolidayPackage;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HolidayPackageResource extends Resource
{
    protected static ?string $model = HolidayPackage::class;

    // TODO: change icon to hugeicons-island
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-s-rectangle-stack';

    protected static ?string $navigationGroup = 'Product';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->live(true)
                                    ->unique()
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->unique(HolidayPackage::class, ignoreRecord: true),
                                MarkdownEditor::make('description')
                                    ->columnSpan(2)
                            ])->columns(2),
                        Section::make()
                            ->schema([
                                DatePicker::make('start_date')
                                    ->after('today')
                                    ->required(),
                                DatePicker::make('end_date')
                                    ->afterOrEqual('start_date ')
                                    ->required(),
                                Select::make('type')
                                    ->required()
                                    ->native(false)
                                    ->options(
                                        collect(PackageTypeEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->name])->toArray()
                                    )->columnSpan(2)
                            ])->columns(2)
                    ]),
                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                DatePicker::make('available_at')
                                    ->afterOrEqual('today')
                                    ->default(now())
                                    ->before('end_date')
                                    ->required(),
                                Toggle::make('is_visible')
                                    ->label('Visibility')
                                    ->helperText('Enable or disable package visibility')
                                    ->default(true),
                            ]),
                        Section::make('Images')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Poster')
                                    ->required()
                                    ->image()
                                    ->imageEditor(),
                            ])->collapsible(),
                        Section::make('Associations')
                            ->schema([
                                Select::make('category_id')
                                    ->multiple()
                                    ->relationship(
                                        "categories",
                                        "name"
                                    )
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('end_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('categories.name')
                    ->extraAttributes(['class' => 'max-w-96'])
                    ->wrapHeader()
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_visible')
                    ->label('Visibility')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('type'),
                TextColumn::make('available_at')->date()->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_visible')
                    ->label('Visibility')
                    ->boolean()
                    ->trueLabel('Only visible package')
                    ->falseLabel('Only hidden package')
                    ->native(false),
                SelectFilter::make('category')
                    ->label('Category')
                    ->relationship('categories', 'name')
                    ->native(false)
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
            'index' => Pages\ListHolidayPackages::route('/'),
            'create' => Pages\CreateHolidayPackage::route('/create'),
            'edit' => Pages\EditHolidayPackage::route('/{record}/edit'),
        ];
    }
}
