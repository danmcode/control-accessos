<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class EmailConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        "email",
        "password",
        "protocol",
        "encryption",
        "port",
        "host",
        "username",
        "created_by",
        "updated_by"
    ];

    public static function validateEmailConfig(array $emailConfig)
    {
        $isValidEmailConfig = Validator::make($emailConfig, [
            'email' => 'required|email|unique:email_configs|max:255',
            'password' => 'required|max:255',
            'protocol' => 'required|max:255',
            'encryption' => 'required|string|max:4',
            'port' => 'required|numeric',
            'host' => 'required|string|max:255',
            'username' => 'required|string|unique:email_configs|max:255',
        ]);

        return $isValidEmailConfig;
    }

    public static function getEmailConfig(){
        
        $emailConfig = EmailConfig::get();
        
        if(sizeof($emailConfig) === 0){
            $model = new EmailConfig();
            $emailConfig = $model;
        }else{
            $emailConfig = $emailConfig[0];
        }

        return $emailConfig;
    }
}
