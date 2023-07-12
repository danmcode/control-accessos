<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'is_active',
        'created_by',
        'updated_by'
    ];

    /**
     * Get the location that owns the company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }
}
