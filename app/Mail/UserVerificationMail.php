<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

/**
 * Class UserVerificationMail
 * @package App\Mail
 */
class UserVerificationMail extends VerifyEmail
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->greeting(Lang::get('user.verify.greeting'))
            ->subject(Lang::get('user.verify.subject'))
            ->line(Lang::get('user.verify.lines.one'))
            ->action(Lang::get('user.verify.action'), $verificationUrl)
            ->line(Lang::get('user.verify.lines.two'))
            ->salutation(Lang::get('user.verify.salutation'));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable): string
    {
        return URL::temporarySignedRoute(
            'users.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
