<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\EventRegistration;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EventStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Events', Event::count())
                ->icon('heroicon-o-calendar'),

            Stat::make('Upcoming Events',
                Event::where('start_at', '>', now())->count()
            )->icon('heroicon-o-clock'),

            Stat::make('Total Registrations',
                EventRegistration::count()
            )->icon('heroicon-o-user-group'),
        ];
    }
}
