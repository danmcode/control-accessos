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
        'visitor_id',
        'created_by',
        'updated_by',
        'registered_in_by',
        'registered_out_by',

    ];

    public function Visitor()
    {
        return $this->belongsTo(Visitors::class);
    }
}
