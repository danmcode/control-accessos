<?php

namespace App\Models\AccessControl;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

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

    public static function validateCollaborator(array $collaborator)
    {
        $isValidCollaborator = Validator::make($collaborator, [
            "user_id" => 'required',
            "company_id" => 'required',
            "area_id" => 'required',
            "job_title_id" => 'required',
            "location_id" => 'required',
        ]);

        return $isValidCollaborator;
    }

    public static function getIncomeExitCollaborators(){
        
        $incomeOutputs = IncomeExitCollaborators::with('collaborator')
            ->with('collaborator.company')
            ->with('collaborator.area')
            ->with('collaborator.jobTitle')
            ->with('collaborator.location')
            ->with('collaborator.user')
            ->orderBy('date_time_out', 'asc')
            ->limit(30)
            ->get();
        
        return $incomeOutputs;
    }


    public function user()
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

    public function incomeExitCollaborator()
    {
        return $this->hasMany(IncomeExitCollaborators::class);
    }
}
