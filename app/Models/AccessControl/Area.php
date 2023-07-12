<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
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
     * Get the companies that owns the Area
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get all of the jobsTitle for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }
}
