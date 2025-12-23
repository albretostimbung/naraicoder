<?php

namespace App\Filament\Resources\Events\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn($record) => $record->slug)
                    ->color('primary'),

                BadgeColumn::make('event_type')
                    ->label('Type')
                    ->colors([
                        'primary' => 'workshop',
                        'success' => 'seminar',
                        'warning' => 'webinar',
                    ]),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'danger' => 'draft',
                        'info' => 'published',
                        'success' => 'completed',
                        'warning' => 'cancelled',
                    ])
                    ->icons([
                        'heroicon-o-pencil' => 'draft',
                        'heroicon-o-check-circle' => 'published',
                        'heroicon-o-flag' => 'completed',
                        'heroicon-o-x-circle' => 'cancelled',
                    ]),

                TextColumn::make('start_at')
                    ->label('Start Date')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->color('warning'),

                TextColumn::make('end_at')
                    ->label('End Date')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->color('danger'),

                TextColumn::make('creator.name')
                    ->label('Created By')
                    ->sortable()
                    ->searchable(),

                IconColumn::make('is_featured')
                    ->label('')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-star')
                    ->trueColor('warning')
                    ->falseColor('gray'),
            ])
            ->filters([
                SelectFilter::make('event_type')
                    ->label('Filter by Type')
                    ->options([
                        'workshop' => 'Workshop',
                        'seminar' => 'Seminar',
                        'webinar' => 'Webinar',
                    ]),

                SelectFilter::make('status')
                    ->label('Filter by Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'completed' => 'Completed',
                    ]),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit Event')
                    ->icon('heroicon-o-pencil')
                    ->color('primary'),
                DeleteAction::make()
                    ->label('Hapus Event')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->successNotificationTitle('Event berhasil dihapus.')
            ])
            ->emptyStateHeading('Belum ada event tersedia')
            ->emptyStateDescription('Klik tombol "New Event" di atas untuk membuat event pertama Anda.')
            ->emptyStateIcon('heroicon-o-calendar-days');
    }
}
