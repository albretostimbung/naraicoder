<?php

namespace App\Filament\Resources\Events;

use App\Constants\GeneralConstant;
use App\Filament\Resources\Events\Pages\CreateEvent;
use App\Filament\Resources\Events\Pages\EditEvent;
use App\Filament\Resources\Events\Pages\ListEvents;
use App\Filament\Resources\Events\Schemas\EventForm;
use App\Filament\Resources\Events\Tables\EventsTable;
use App\Models\Event;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    // Icon yang lebih relevan untuk Events
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days';

    // Label navigasi yang lebih deskriptif
    protected static ?string $navigationLabel = 'Events';

    protected static ?string $modelLabel = 'Event';

    protected static ?string $pluralModelLabel = 'Events';

    // Badge untuk menunjukkan jumlah events aktif
    protected static ?string $navigationBadge = null;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', GeneralConstant::EVENT_STATUS_PUBLISHED)->count();
    }

    protected static string|\Illuminate\Contracts\Support\Htmlable|null $navigationBadgeTooltip = 'Total events yang sedang aktif';

    // Sort order di navigation
    protected static ?int $navigationSort = 1;

    // Record title untuk breadcrumb yang lebih informatif
    protected static ?string $recordTitleAttribute = 'title';

    // Slug untuk URL yang lebih SEO friendly
    protected static ?string $slug = 'events';

    public static function form(Schema $schema): Schema
    {
        return EventForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventsTable::configure($table);
    }

    // Helper method untuk mendapatkan total statistik
    public static function getNavigationBadgeColor(): string|array|null
    {
        $count = static::getModel()::where('status', 'published')->count();

        if ($count > 10) {
            return 'success';
        } elseif ($count > 5) {
            return 'warning';
        }

        return 'gray';
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relation managers jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEvents::route('/'),
            'create' => CreateEvent::route('/create'),
            'edit' => EditEvent::route('/{record}/edit'),
        ];
    }

    // Global search configuration untuk pencarian cepat
    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'description'];
    }

    // Custom label untuk hasil pencarian
    public static function getGlobalSearchResultTitle(\Illuminate\Database\Eloquent\Model $record): string
    {
        return $record->title;
    }

    // Detail tambahan di hasil pencarian
    public static function getGlobalSearchResultDetails(\Illuminate\Database\Eloquent\Model $record): array
    {
        return [
            'Type' => ucfirst($record->event_type),
            'Status' => ucfirst($record->status),
            'Date' => $record->start_at?->format('d M Y'),
        ];
    }

    // URL untuk hasil pencarian global
    public static function getGlobalSearchResultUrl(\Illuminate\Database\Eloquent\Model $record): string
    {
        return static::getUrl('edit', ['record' => $record]);
    }
}
