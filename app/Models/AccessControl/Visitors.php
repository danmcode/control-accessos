<?php

namespace App\Models\AccessControl;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'identification_type',
        'identification',
        'name',
        'photo_path',
        'last_name',

    ];


    public function IdentificationType()
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type');
    }

    /*     public static function getIncomeExitVisitor()
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
    } */
}
