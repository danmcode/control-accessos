<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHours extends Model
{
    use HasFactory;

    protected $fillable = [
        "time_in",
        "time_out",
        "created_by",
        "updated_by"
    ];
}
