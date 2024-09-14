<?php

namespace App\Filament\Resources;

use App\Enums\TransactionStatusEnum;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\HolidayPackage;
use App\Models\PackageVariant;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $activeNavigationIcon = 'heroicon-s-banknotes';

    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'processing')->count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Transaction Details')
                        ->schema([
                            TextInput::make('ref')
                                ->default('REF-' . random_int(100000, 9999999))
                                ->disabled()
                                ->dehydrated()
                                ->required(),
                            Select::make('user_id')
                                ->relationship('user', 'name')
                                ->searchable()
                                ->required(),
                            Select::make('payment_method')
                                ->options([
                                    'transfer' => 'Transfer Bank',
                                    'va' => 'VA',
                                    'ewallet' => 'eWallet'
                                ])
                                ->native(false)
                                ->required(),
                            Select::make('status')
                                ->options([
                                    'pending' => TransactionStatusEnum::PENDING->value,
                                    'processing' => TransactionStatusEnum::PROCESSING->value,
                                    'completed' => TransactionStatusEnum::COMPLETED->value,
                                    'declined' => TransactionStatusEnum::DECLINED->value,
                                ])
                                ->native(false)
                                ->required(),
                            MarkdownEditor::make('notes')
                                ->columnSpan(2)
                        ])->columns(2),
                    Step::make('Transaction Items')
                        ->schema([
                            Select::make('package_variants_id')
                                ->options(PackageVariant::query()->pluck('name', 'id'))
                                ->label('Variant')
                                ->native(false)
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function ($state, Set $set) {
                                    $set('total_price', PackageVariant::find($state)?->price ?? 0);
                                }),
                            TextInput::make('total_price')
                                ->disabled()
                                ->dehydrated()
                                ->numeric()
                                ->required(),
                        ])->columns(2),
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ref')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total_price')
                    ->money('IDR')
                    ->searchable()
                    ->sortable()
                    ->summarize([Sum::make()->money('IDR')]),
                TextColumn::make('created_at')
                    ->label('Order at')
                    ->date(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
