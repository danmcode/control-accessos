<?php

namespace App\Models\AccessControl;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_permission',
        'collaborator_permission',
        'diff_hours',
        'start_hour',
        'final_hour',
        'reason_permission',
        'status_auth',
        'observation',
        'allowed_by',
    ];

    public function userC()
    {
        return $this->belongsTo(User::class, 'collaborator_permission');
    }

    public function userJ()
    {
        return $this->belongsTo(User::class, 'allowed_by');
    }
}
