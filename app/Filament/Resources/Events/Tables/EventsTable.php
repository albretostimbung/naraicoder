<?php

namespace App\Filament\Resources\Events\Tables;

use App\Constants\GeneralConstant;
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
                        'primary' => GeneralConstant::EVENT_TYPE_ONLINE,
                        'secondary' => GeneralConstant::EVENT_TYPE_OFFLINE,
                    ]),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => GeneralConstant::EVENT_STATUS_COMING_SOON,
                        'success' => GeneralConstant::EVENT_STATUS_OPEN,
                        'danger' => GeneralConstant::EVENT_STATUS_CLOSED,
                    ])
                    ->icons([
                        'heroicon-o-play' => GeneralConstant::EVENT_STATUS_COMING_SOON,
                        'heroicon-o-check-circle' => GeneralConstant::EVENT_STATUS_OPEN,
                        'heroicon-o-x-circle' => GeneralConstant::EVENT_STATUS_CLOSED,
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
                        GeneralConstant::EVENT_TYPE_ONLINE => 'Online',
                        GeneralConstant::EVENT_TYPE_OFFLINE => 'Offline',
                    ]),

                SelectFilter::make('status')
                    ->label('Filter by Status')
                    ->options([
                        GeneralConstant::EVENT_STATUS_COMING_SOON => 'Coming Soon',
                        GeneralConstant::EVENT_STATUS_OPEN => 'Open',
                        GeneralConstant::EVENT_STATUS_CLOSED => 'Closed',
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
