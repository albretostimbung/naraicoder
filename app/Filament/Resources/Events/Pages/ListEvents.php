<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    // Tambah icon di heading
    protected static ?string $title = 'Events Management';

    // Tambah description
    public function getSubheading(): ?string
    {
        return 'Kelola semua event yang tersedia. Klik "New Event" untuk membuat event baru.';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Event')
                ->icon('heroicon-o-plus-circle')
                ->color('warning'),
        ];
    }
}
