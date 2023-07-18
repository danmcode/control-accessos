<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Mail\SendTemporalPassword;
use App\Models\AccessControl\Area;
use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\Company;
use App\Models\AccessControl\IdentificationType;
use App\Models\AccessControl\JobTitle;
use App\Models\AccessControl\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all user collaborator active
        $users = User::where('is_active', '=', true)
            ->where('id', '!=', 1)
            ->with('identificationTypes')
            ->with('collaborators.company')
            ->with('collaborators.area')
            ->with('collaborators.jobTitle')
            ->with('collaborators.location')
            ->get();
    

        return view('AccessControl.Collaborators.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Get all identifications types
        $identificationTypes = IdentificationType::where('is_active', '=', true)
        ->get();

        //Get all companies
        $companies = Company::where('is_active', '=', true)
        ->get();

        //Get all Áreas
        $areas = Area::where('is_active', '=', true)
        ->get();

        //Get all Cargos
        $jobTitles = JobTitle::where('is_active', '=', true)
        ->get();

        //Get all Locations
        $locations = Location::where('is_active', '=', true)
            ->get();

        return view('AccessControl.Collaborators.create', [
            'companies' => $companies,
            'areas' => $areas,
            'jobTitles' => $jobTitles,
            'locations' => $locations,
            'identificationTypes' => $identificationTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * TODO: 
         * Hay que verificar lo que suceden los siguientes escenarios:
         * - El usuario ya existe
         * - El colaborador ya existe
         * - Cuando no se puede enviar el correo
         */
        // Receive data from form
        $data = $request->all();

        $imagePath = "/images/default.png";

        // Create a new user password
        $password = User::generatePassword(8);

        $data['password'] = Hash::make($password);

        // Get the username from email
        $username = explode("@", $data['email'])[0];

        // Create a user with request info
        $userCreated = User::create([
            'username' => $username,
            'identification' => $data['identification'],
            'identification_type' => $data['identification_type'],
            'photo_path' => $imagePath,
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'role_id' => 2, // TODO: Realizar la configuración de los roles
            'created_by' => auth()->user()->id,
            'password' =>  $data['password'],
        ]);

        // if the user was created
        if($userCreated){
            // Create collaborator
            $collaboratorCreated = Collaborator::create([
                'user_id' => $userCreated->id,
                'company_id' => $data['company_id'],
                'area_id' => $data['area_id'],
                'job_title_id' => $data['job_title_id'],
                'location_id' => $data['location_id'], 
            ]);

            if( $collaboratorCreated ){

                // Verify if the form send image
                if( $data['photoDataInput'] != null ){
                    
                    // $imageData = str_replace('data:image/png;base64,', '', $data['photoDataInput']);
                    // $imageData = str_replace(' ', '+', $imageData);
                    $photoData = preg_replace('/^data:image\/(jpeg|png|gif);base64,/', '', $data['photoDataInput']);
                    $image = base64_decode($photoData);

                    $fileName = uniqid() . '.png';

                    // Save the user collaborator image
                    $filePath = 'collaborators/images/' . $fileName;
                    Storage::disk('public')->put($filePath, $image);
    
                    $userCreated->photo_path = $filePath;
                    $userCreated->save();
    
                }

                $fullName = $data['name'] . " " . $data['last_name'];
                
                // Enviar contraseña por correo.
                // Mail::to($data['email'])->send(new SendTemporalPassword($fullName, $password, $username));

                return redirect()->route('colaboradores.index')
                    ->with('success', 'Se ha realizado la creación del colaborador');
                    
            }else{
                return redirect()->route('colaboradores.index')
                ->with('error', 'No se pudo crear el colaborador');
            }

        }else{
            return redirect()->route('colaboradores.index')
            ->with('error', 'No se pudo crear el usuario');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Collaborator $collaborator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collaborator $collaborator)
    {
        //
        return view('AccessControl.Collaborators.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collaborator $collaborator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collaborator $collaborator)
    {
        //
    }
}
