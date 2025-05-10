<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;

class ProfitChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Total Keuntungan';

    protected static string $chartType = 'line';

    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
        'scales' => [
            'y' => [
                'beginAtZero' => true,
                'ticks' => [
                    'callback' => 'function(value) { return "Rp " + value; }',
                ],
            ],
        ],
    ];

    protected int|string|array $columnSpan = 2;

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hari Ini',
            'week' => 'Minggu Ini',
            'month' => 'Bulan Ini',
            'year' => 'Tahun Ini',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter ?? 'month';

        $query = Booking::where('status', 'confirmed');

        $data = match ($activeFilter) {
            'today' => Trend::query($query)
                ->between(
                    start: now()->startOfDay(),
                    end: now()->endOfDay(),
                )
                ->perHour()
                ->sum('total_harga'),
            'week' => Trend::query($query)
                ->between(
                    start: now()->startOfWeek(),
                    end: now()->endOfWeek(),
                )
                ->perDay()
                ->sum('total_harga'),
            'month' => Trend::query($query)
                ->between(
                    start: now()->startOfMonth(),
                    end: now()->endOfMonth(),
                )
                ->perDay()
                ->sum('total_harga'),
            'year' => Trend::query($query)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->sum('total_harga'),
        };

        return [
            'datasets' => [
                [
                    'label' => 'Keuntungan (IDR)',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#36A2EB',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => match ($activeFilter) {
                'today' => Carbon::parse($value->date)->format('H:i'),
                'week' => Carbon::parse($value->date)->translatedFormat('D'),
                'month' => Carbon::parse($value->date)->translatedFormat('j M'),
                'year' => Carbon::parse($value->date)->translatedFormat('F'),
            }),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}