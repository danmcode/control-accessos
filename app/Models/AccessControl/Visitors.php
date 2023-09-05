<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification_type',
        'identification',
        'name',
        'photo_path',
        'last_name',
        'visitor_type',
        'company',
        'arl_id',
        'date_arl',
        'remission',
        'equipment_type',
        'vehicle_type',
        'id_collaborator',
        'id_user'
    ];
}
