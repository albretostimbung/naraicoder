<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Hapus Event')
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->requiresConfirmation()
                ->modalHeading('Hapus Event')
                ->modalDescription('Apakah Anda yakin ingin menghapus event ini? Tindakan ini tidak dapat dibatalkan.')
                ->modalSubmitActionLabel('Hapus')
                ->modalCancelActionLabel('Batal')
        ];
    }

    // Custom form actions dengan styling lebih baik
    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
                ->label('Simpan Event')
                ->color('success')
                ->icon('heroicon-o-check')
                ->keyBindings(['mod+s']),

            $this->getCancelFormAction()
                ->label('Batal')
                ->color('gray'),
        ];
    }
}
