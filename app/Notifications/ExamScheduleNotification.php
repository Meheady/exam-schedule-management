<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExamScheduleNotification extends Notification
{
    use Queueable;

    protected $formattedDate;
    protected $scheduleByBatch;
    protected $schedules;
    protected $firstRow;

    /**
     * Create a new notification instance.
     */
    public function __construct($formattedDate,$scheduleByBatch,$schedules,$firstRow)
    {
        $this->formattedDate = $formattedDate;
        $this->schedules = $schedules;
        $this->scheduleByBatch = $scheduleByBatch;
        $this->firstRow = $firstRow;
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
        $formattedDate = $this->formattedDate;
        $scheduleByBatch = $this->scheduleByBatch;
        $schedules = $this->schedules;
        $firstRow = $this->firstRow;

        return (new MailMessage)->view('mail.exam-schedule', compact('formattedDate','scheduleByBatch','schedules','firstRow'));
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
