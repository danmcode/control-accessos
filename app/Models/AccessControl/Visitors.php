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

    public function IdentificationType()
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type');
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

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    /*     public function incomeExitVisitor()
    {
        return $this->hasMany(IncomeExitVisitors::class, 'visitor_id');
    } */

    public static function getIncomeExitVisitor()
    {

        $incomeOutputs = IncomeExitVisitors::with('Visitor')
            ->with('Visitor.VisitorType')
            ->with('Visitor.IdentificationType')
            ->with('Visitor.Vehicle')
            ->with('Visitor.Equipment')
            ->with('Visitor.Collaborator')
            ->orderByRaw('ISNULL(date_time_out) DESC, date_time_out DESC')
            ->limit(30)
            ->get();

        return $incomeOutputs;
    }
}
