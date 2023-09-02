<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\IdentificationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'identification',
        'identification_type',
        'photo_path',
        'name',
        'last_name',
        'is_active',
        'email',
        'role_id',
        'created_by',
        'updated_by',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relations

    /**
     * Get the collaborator associated with the user
     */
    public function collaborators()
    {
        return $this->hasOne(Collaborator::class);
    }

    public function identificationTypes()
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type');
    }


    /**
     * Generate a new user password
     */
    public static function generatePassword($length)
    {
        $chars = '0123456789*#abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ$%&';
        $aleatoryString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $aleatoryIndex = mt_rand(0, strlen($chars) - 1);
            $aleatoryChar = $chars[$aleatoryIndex];
            $aleatoryString .= $aleatoryChar;
        }
    
        return $aleatoryString;
    }

    public static function getAllUsersRelations() : array{

        $users = User::where('is_active', true)
        ->where('id', '!=', 1)
        ->with('identificationTypes')
        ->with('collaborators.company')
        ->with('collaborators.area')
        ->with('collaborators.jobTitle')
        ->with('collaborators.location')
        ->get();

        $users = [ 'users' => $users ] ;

        return $users;
    }

    public static function getUserRelationById($collaborator) : array {

        $user = User::where('is_active', '=', true)
            ->where('id', '=', $collaborator)
            ->with('identificationTypes')
            ->with('collaborators.company')
            ->with('collaborators.area')
            ->with('collaborators.jobTitle')
            ->with('collaborators.location')
            ->get();

        $user = [ 'user' => $user[0] ] ;

        return $user;
    }
}
