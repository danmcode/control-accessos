<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeExitCollaborators extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time_in',
        'date_time_out',
        'collaborator_id',
        'created_by',
        'updated_by',
        'registered_in_by',
        'registered_out_by',
        'observation',
        'out_of_time',
    ];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }

    
}
