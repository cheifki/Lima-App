<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;


class TractorBookingNotification extends Notification
{
    use Queueable;

    protected $bookingData;

    /**
     * Create a new notification instance.
     *
     * @param  array  $bookingData
     * @return void
     */
    public function __construct(array $bookingData)
    {
        $this->bookingData = $bookingData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $bookingId = $this->bookingData['booking_id'] ?? null; // Add null as a default value if 'booking_id' key is not present
        $user = $this->bookingData['user'];


        $acceptUrl = URL::signedRoute('booking.accept', ['booking' => $bookingId ?? '']);
        $rejectUrl = URL::signedRoute('booking.reject', ['booking' => $bookingId ?? '']);


        
        return (new MailMessage)
            ->subject('New Tractor Booking')
            ->line('A user has booked a tractor.')
            ->line('User ID: ' . $user->name)
            
            ->action('Reject', $rejectUrl)
            ->action('Accept', $acceptUrl)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
