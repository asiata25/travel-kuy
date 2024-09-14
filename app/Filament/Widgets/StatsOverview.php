<?php

namespace App\Filament\Widgets;

use App\Enums\TransactionStatusEnum;
use App\Models\HolidayPackage;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Increase in Users')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),
            Stat::make('Package Actvie', HolidayPackage::where('is_visible', 1)->count())
                ->description('Show visible packages')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),
            Stat::make('Pending Transaction', HolidayPackage::where('status', TransactionStatusEnum::PENDING)->count())
                ->description('Total pending transaction')
                ->descriptionIcon('heroicon-o-arrow-trending-down')
                ->color('danger'),
        ];
    }
}
