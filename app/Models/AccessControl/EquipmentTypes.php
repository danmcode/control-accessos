<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
