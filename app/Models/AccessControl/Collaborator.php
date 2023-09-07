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

    /**
     * Get the user that owns the collaborator.
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public static function getCollaboratorRelationById($collaborator): array
    {

        $collaborator = Collaborator::where('id', '=', $collaborator)
        ->with('users')
        ->with('location')
        ->get();

        $collaborator = ['collaborator' => $collaborator[0]];

        return $collaborator;
    }
}
