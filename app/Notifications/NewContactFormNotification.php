<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Notification as FilamentNotification;

class NewContactFormNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $message
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Nouveau message de contact',
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ];
    }

    /**
     * Envoie une notification Filament
     */
    public function toFilament(): void
    {
        FilamentNotification::make()
            ->title('Nouveau message de contact')
            ->icon('heroicon-o-envelope')
            ->body("Message reçu de {$this->name} ({$this->email})")
            ->warning()
            ->sendToDatabase(auth()->user());
    }
}
