<?php

namespace App\Base\Auth;

use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends BaseResetPassword
{
    /**
     * Build the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail()
    {
        $message = (new MailMessage)
            ->subject(trans('auth.password.email.action'))
            ->greeting(trans('auth.password.email.introduction'))
            ->line(trans('auth.password.email.content'))
            ->action(trans('auth.password.email.action'), route('password.reset.token', ['token' => $this->token]))
            ->line(trans('auth.password.email.conclusion'));
        return $message;
    }
}
