<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\AccessControl\EmailConfig;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $emailConfig = EmailConfig::getEmailConfig();

        if($emailConfig)
        {
            $data = [
                'driver' => $emailConfig->protocol,
                'host' => $emailConfig->host, 
                'port' => $emailConfig->port, 
                'encryption' => $emailConfig->encryption, 
                'username' => $emailConfig->username, 
                'password' => $emailConfig->password, 
                'protocol' => $emailConfig->protocol,
                'from' => [
                    'address' => $emailConfig->email,
                    'name' => 'Control de accesos',
                ]
            ];

            Config::set('mail', $data);
        }
    }
}
