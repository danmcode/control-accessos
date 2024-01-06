<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanComputer extends Model
{
    use HasFactory;

    protected $fillable = [
        'computer_name',
        'brand',
        'serial',
        'on_loan',
        'is_active',
        'state',
        'created_by',
        'updated_by'
    ];

    public static function getLoanComputers(): array
    {
        return ['loanComputers' => LoanComputer::where('is_active', true)->get()];
    }
}
