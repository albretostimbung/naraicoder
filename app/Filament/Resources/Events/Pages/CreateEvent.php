<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;
use Illuminate\Support\Str;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    // Judul halaman yang lebih deskriptif dengan icon
    protected static ?string $title = 'Buat Event Baru';

    // Breadcrumb custom
    protected static ?string $breadcrumb = 'Tambah Event';

    // Set max width untuk form yang lebih readable
    public function getMaxContentWidth(): ?string
    {
        return '8xl';
    }

    // Redirect setelah create dengan pilihan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // Notifikasi sukses custom dengan emoji
    protected function getCreatedNotificationTitle(): ?string
    {
        return false;
    }

    // Custom form actions dengan styling lebih baik
    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Simpan Event')
                ->color('success')
                ->icon('heroicon-o-check')
                ->keyBindings(['mod+s']),

            $this->getCreateAnotherFormAction()
                ->label('Simpan & Buat Lagi')
                ->color('primary')
                ->icon('heroicon-o-plus-circle'),

            $this->getCancelFormAction()
                ->label('Batal')
                ->color('gray'),
        ];
    }

    // Helper text di header
    protected function getHeaderWidgets(): array
    {
        return [];
    }

    // Tambahkan subtitle/description
    public function getSubheading(): ?string
    {
        return 'Lengkapi form di bawah ini untuk membuat event baru. Semua field bertanda (*) wajib diisi.';
    }

    // Autofill created_by
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();

        // Auto-generate slug jika kosong
        if (empty($data['slug']) && !empty($data['title'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return $data;
    }

    // Success message dengan action buttons
    protected function afterCreate(): void
    {
        $event = $this->record;

        Notification::make()
            ->success()
            ->title('Event berhasil dibuat!')
            ->body("Event \"$event->title\" telah ditambahkan.")
            ->actions([
                Action::make('view')
                    ->label('Lihat Event')
                    ->url(EventResource::getUrl('edit', ['record' => $event->getKey()]))
                    ->openUrlInNewTab(),

                Action::make('create-another')
                    ->label('Buat Event Lainnya')
                    ->url($this->getResource()::getUrl('create')),
            ])
            ->send();
    }
}
