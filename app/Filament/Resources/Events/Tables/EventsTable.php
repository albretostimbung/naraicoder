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
                        'danger' => GeneralConstant::EVENT_STATUS_DRAFT,
                        'info' => GeneralConstant::EVENT_STATUS_PUBLISHED,
                        'success' => GeneralConstant::EVENT_STATUS_COMPLETED,
                        'warning' => GeneralConstant::EVENT_STATUS_CANCELLED,
                    ])
                    ->icons([
                        'heroicon-o-pencil' => GeneralConstant::EVENT_STATUS_DRAFT,
                        'heroicon-o-check-circle' => GeneralConstant::EVENT_STATUS_PUBLISHED,
                        'heroicon-o-flag' => GeneralConstant::EVENT_STATUS_COMPLETED,
                        'heroicon-o-x-circle' => GeneralConstant::EVENT_STATUS_CANCELLED,
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
                        GeneralConstant::EVENT_STATUS_DRAFT => 'Draft',
                        GeneralConstant::EVENT_STATUS_COMPLETED => 'Completed',
                        GeneralConstant::EVENT_STATUS_PUBLISHED => 'Published'
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
