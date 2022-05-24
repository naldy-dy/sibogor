<?php 

namespace App\Http\Controllers;
use App\Models\User;
use Faker;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class WelcomeEmailNotification extends Controller{

    public function __construct(User $user){
        $this->user = $user;
    }

     function toMail($notifiable){
        return (new MailMessage)
                    ->greeting('Hello, '.$this->user->nama)
                    ->line('Welcome to SIBOGOR.')
                    ->action('Explore', url('/'))
                    ->line('Thank you for using our application!');
    }
}

