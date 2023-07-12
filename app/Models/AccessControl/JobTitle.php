<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'company_id',
        'is_active',
        'created_by',
        'updated_by'
    ];

    /**
     * Get the jobTitle that owns the area
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    
    /**
     * Get the JobTitle that owns the company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    //
    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }

}
