<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeExitVisitors extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time_in',
        'date_time_out',
        'observation',
        'visitor_type_id',
        'visitor_id',
        'company',
        'arl_id',
        'date_arl',
        'remission',
        'equipment_id',
        'vehicle_id',
        'id_collaborator',
        'created_by',
        'updated_by',
        'registered_in_by',
        'registered_out_by',

    ];

    public function Visitor()
    {
        return $this->belongsTo(Visitors::class);
    }

    public function VisitorType()
    {
        return $this->belongsTo(VisitorTypes::class, 'visitor_type_id');
    }
    public function Vehicle()
    {
        return $this->belongsTo(Vehicles::class);
    }

    public function Equipment()
    {
        return $this->belongsTo(Equipments::class);
    }

    public function Collaborator()
    {
        return $this->belongsTo(Collaborator::class, 'id_collaborator');
    }
}
