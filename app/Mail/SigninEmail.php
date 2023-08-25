<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class SigninEmail extends Mailable
{
    use Queueable, SerializesModels;

       /**
    * @var User
    **/
    protected $user = null;

   /**
    * @var string
    **/
    protected $url = null;

    /**
     * Create a new message instance.
     */
        public function __construct(User $user, $url)
        {
            $this->user = $user;
            $this->url = $url;
        }

    /**
    * Build the message.
    *
    * @return $this
    */
        public function build()
        {
            return $this->markdown('emails.magiclink')
                        ->from( 'no-reply@pmoxsuite.es')
                        ->to($this->user->email)
                        ->with(['url' => $this->url]);
        }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Signin Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
