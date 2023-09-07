<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'mark',
        'placa',
        'color',
        'vehicle_type_id',
    ];

    public function VehicleType()
    {
        return $this->belongsTo(VehicleTypes::class);
    }

}
