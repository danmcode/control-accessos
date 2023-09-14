<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
