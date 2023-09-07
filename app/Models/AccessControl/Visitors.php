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
        'visitor_type_id',
        'company',
        'arl_id',
        'date_arl',
        'remission',
        'equipment_id',
        'vehicle_id',
        'id_collaborator',
        'id_user'
    ];

    public function VisitorType()
    {
        return $this->belongsTo(VisitorTypes::class);
    }

    public function Vehicle()
    {
        return $this->belongsTo(Vehicles::class);
    }

    public function Equipment()
    {
        return $this->belongsTo(Equipments::class);
    }

    public function incomeExitVisitor()
    {
        return $this->hasMany(IncomeExitVisitors::class,'visitor_id');
    }



}
