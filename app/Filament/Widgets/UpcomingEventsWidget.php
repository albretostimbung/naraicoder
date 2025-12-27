<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Widgets\Widget;

class UpcomingEventsWidget extends Widget
{
    protected string $view = 'filament.widgets.upcoming-events-widget';

    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'events' => Event::where('start_at', '>', now())
                ->orderBy('start_at')
                ->limit(5)
                ->get(),
        ];
    }
}
