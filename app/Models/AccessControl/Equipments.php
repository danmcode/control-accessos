<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    use HasFactory;

    protected $fillable = [
        'mark',
        'serial',
        'description',
        'equipment_type_id',
    ];

    public function EquipmentType()
    {
        return $this->belongsTo(EquipmentTypes::class);
    }
}
