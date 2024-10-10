<?php

namespace App\Providers;

use Config;
use Illuminate\Support\ServiceProvider;

class SmtpSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Config::set('mail.from.address', setting('email_from_name'));
        Config::set('mail.from.address', setting('email_from_address'));

        Config::set('mail.mailers.smtp.host', setting('mail_host'));
        Config::set('mail.mailers.smtp.port', setting('mail_port'));
        Config::set('mail.mailers.smtp.username', setting('mail_username'));
        Config::set('mail.mailers.smtp.password', setting('mail_password'));
        Config::set('mail.mailers.smtp.encryption', setting('mail_secure'));

        // Set default mailer to use SMTP
        Config::set('mail.default', 'smtp');
    }
}
