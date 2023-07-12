<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_manager',
        'user_id',
        'company_id',
        'area_id',
        'job_title_id',
        'location_id', 
    ];

    /**
     * Get the user that owns the collaborator.
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function identificationType()
    {
        return $this->belongsTo(IdentificationType::class);
    }
}
