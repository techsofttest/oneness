<?php

// app/Mail/UserStatusChanged.php

namespace App\Mail;

use App\Models\Usernew; // <-- use your actual user model
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(Usernew $user) // <-- change User to Usernew
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.user-status')
                    ->with([
                        'user' => $this->user
                    ]);
    }
}
