<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Dasar Event')
                    ->description('Masukkan informasi utama tentang event Anda')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Event')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Workshop Laravel Filament 2024')
                            ->helperText('Gunakan judul yang menarik dan deskriptif')
                            ->reactive()
                            ->afterStateUpdated(function (TextInput $component, ?string $state, callable $set) {
                                if ($state) {
                                    $slug = \Str::slug($state);
                                    $set('slug', $slug);
                                }
                            }),

                        Hidden::make('slug')
                            ->required()
                            ->dehydrated(),

                        Textarea::make('description')
                            ->label('Deskripsi Event')
                            ->rows(4)
                            ->placeholder('Jelaskan detail event, tujuan, dan manfaat untuk peserta...')
                            ->helperText('Berikan informasi lengkap dan menarik')
                            ->columnSpanFull(),
                    ]),

                Section::make('Detail Event')
                    ->description('Tentukan tipe, status, dan jadwal event')
                    ->icon('heroicon-o-calendar')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('event_type')
                                ->label('Tipe Event')
                                ->required()
                                ->options([
                                    'seminar' => 'Seminar',
                                    'workshop' => 'Workshop',
                                    'conference' => 'Conference',
                                    'webinar' => 'Webinar',
                                ])
                                ->native(false)
                                ->helperText('Pilih kategori yang sesuai'),

                            Select::make('status')
                                ->label('Status Event')
                                ->required()
                                ->default('draft')
                                ->options([
                                    'draft' => 'Draft',
                                    'completed' => 'Completed',
                                    'published' => 'Published',
                                    'cancelled' => 'Cancelled',
                                ])
                                ->native(false)
                                ->helperText('Draft tidak akan tampil di public'),
                        ]),

                        Grid::make(2)->schema([
                            DateTimePicker::make('start_at')
                                ->label('Waktu Mulai')
                                ->required()
                                ->native(false)
                                ->seconds(false)
                                ->helperText('Kapan event akan dimulai?'),

                            DateTimePicker::make('end_at')
                                ->label('Waktu Selesai')
                                ->required()
                                ->native(false)
                                ->seconds(false)
                                ->after('start_at')
                                ->helperText('Kapan event akan berakhir?'),
                        ]),
                    ]),

                Section::make('Media')
                    ->description('Upload gambar untuk event Anda')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('Gambar Featured')
                            ->image()
                            ->imageEditor()
                            ->maxSize(2048)
                            ->helperText('Rekomendasi: 1200x630px, Maks. 2MB')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Hidden::make('created_by')
                    ->default(auth()->id())
                    ->dehydrated(),
            ]);
    }
}
