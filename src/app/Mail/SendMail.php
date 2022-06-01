<?php

namespace App\Mail;

use App\Http\Requests\ContactRequest;
use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public ContactRequest $contactRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactRequest $contactRequest)
    {
        $this->contactRequest = $contactRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contact_email')->from('', $this->contactRequest->name)->subject($this->contactRequest->subject)->with(
            [
                'name' => $this->contactRequest->name,
                'email' => $this->contactRequest->email,
                'phone_number' => $this->contactRequest->phone_number,
                'user_message' => $this->contactRequest->user_message,
            ]
        );
    }
}
