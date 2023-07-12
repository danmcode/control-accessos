<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'initials',
        'name',
        'is_active',
        'created_by',
        'updated_by'
    ];
}