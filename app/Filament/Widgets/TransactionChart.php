<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TransactionChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Hanya placeholder',
                    'data' => [0, 2, 5, 5, 2, 8, 9]
                ]
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
