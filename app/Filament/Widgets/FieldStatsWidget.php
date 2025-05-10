<?php

namespace App\Filament\Widgets;

use App\Models\Jadwal;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;

class FieldStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // Hitung metrik saat ini
        $totalJadwal = Jadwal::count();
        $jadwalDipesan = Jadwal::where('status', 'dipesan')->count();
        $jadwalTersedia = Jadwal::where('status', 'tersedia')->count();

        // Hitung metrik untuk periode sebelumnya (30 hari terakhir)
        $previousTotalJadwal = Trend::model(Jadwal::class)
            ->between(
                start: now()->subDays(60),
                end: now()->subDays(30),
            )
            ->perDay()
            ->count()
            ->sum(fn (TrendValue $value) => $value->aggregate);

        $previousJadwalDipesan = Trend::query(Jadwal::where('status', 'dipesan'))
            ->between(
                start: now()->subDays(60),
                end: now()->subDays(30),
            )
            ->perDay()
            ->count()
            ->sum(fn (TrendValue $value) => $value->aggregate);

        $previousJadwalTersedia = Trend::query(Jadwal::where('status', 'tersedia'))
            ->between(
                start: now()->subDays(60),
                end: now()->subDays(30),
            )
            ->perDay()
            ->count()
            ->sum(fn (TrendValue $value) => $value->aggregate);

        // Hitung persentase perubahan
        $totalJadwalTrend = $previousTotalJadwal > 0
            ? (($totalJadwal - $previousTotalJadwal) / $previousTotalJadwal) * 100
            : ($totalJadwal > 0 ? 100 : 0);

        $jadwalDipesanTrend = $previousJadwalDipesan > 0
            ? (($jadwalDipesan - $previousJadwalDipesan) / $previousJadwalDipesan) * 100
            : ($jadwalDipesan > 0 ? 100 : 0);

        $jadwalTersediaTrend = $previousJadwalTersedia > 0
            ? (($jadwalTersedia - $previousJadwalTersedia) / $previousJadwalTersedia) * 100
            : ($jadwalTersedia > 0 ? 100 : 0);

        // Ambil data untuk mini chart (30 hari terakhir)
        $totalJadwalChart = Trend::model(Jadwal::class)
            ->between(
                start: now()->subDays(30),
                end: now(),
            )
            ->perDay()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();

        $jadwalDipesanChart = Trend::query(Jadwal::where('status', 'dipesan'))
            ->between(
                start: now()->subDays(30),
                end: now(),
            )
            ->perDay()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();

        $jadwalTersediaChart = Trend::query(Jadwal::where('status', 'tersedia'))
            ->between(
                start: now()->subDays(30),
                end: now(),
            )
            ->perDay()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();

        return [
            Stat::make('Total Jadwal', $totalJadwal)
                ->description("{$totalJadwalTrend}% " . ($totalJadwalTrend >= 0 ? 'meningkat' : 'menurun') . ' dari 30 hari lalu')
                ->descriptionIcon($totalJadwalTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($totalJadwalChart)
                ->color($totalJadwalTrend >= 0 ? 'success' : 'danger')
                ->icon('heroicon-o-calendar'),
            Stat::make('Jadwal Dipesan', $jadwalDipesan)
                ->description("{$jadwalDipesanTrend}% " . ($jadwalDipesanTrend >= 0 ? 'meningkat' : 'menurun') . ' dari 30 hari lalu')
                ->descriptionIcon($jadwalDipesanTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($jadwalDipesanChart)
                ->color($jadwalDipesanTrend >= 0 ? 'success' : 'danger')
                ->icon('heroicon-o-ticket'),
            Stat::make('Jadwal Tersedia', $jadwalTersedia)
                ->description("{$jadwalTersediaTrend}% " . ($jadwalTersediaTrend >= 0 ? 'meningkat' : 'menurun') . ' dari 30 hari lalu')
                ->descriptionIcon($jadwalTersediaTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($jadwalTersediaChart)
                ->color($jadwalTersediaTrend >= 0 ? 'success' : 'danger')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}