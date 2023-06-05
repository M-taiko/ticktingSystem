<?php

namespace App\Notifications;
use App\Models\tickets;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
class assigntouser extends Notification
{
    use Queueable;
    private $tickets;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(tickets $tickets )
    {
       $this->tickets = $tickets;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

   
    public function toDatabase($notifiable)
    {
        return [
         // 'data' => $this->tickets['body'],

          'id' => $this->tickets->id,
          'title' => ' you had been assigned for ticket By : ' ,
          'user'=> Auth::user()->name,
        ];
    }
 
}
