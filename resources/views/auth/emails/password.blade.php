{{ trans('auth.password.email_content') }}
    {{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}