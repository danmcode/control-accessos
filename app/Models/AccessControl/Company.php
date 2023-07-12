<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'nit',
        'is_active',
        'created_by',
        'updated_by'
    ];

    /**
     * Get all of the areas for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    
    /**
     * Get all of the locations for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * Get the collaborator associated with the company
     */
    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }
}
