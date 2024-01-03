<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Mail\SendTemporalPassword;
use App\Models\User;
use App\Models\AccessControl\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Helpers\CustomHelpers;
use Illuminate\Support\Facades\Validator;

class CollaboratorController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('accessAGSJC', auth()->user());
        return view('AccessControl.Collaborators.index', User::getAllUsersRelations());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('accessAGSJC', auth()->user());
        return view('AccessControl.Collaborators.create', getDropdownsList());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make(User::generatePassword(8));
        $imagePath = "/images/default.png";

        $user = [
            'username' => explode('@', $data['email'])[0],
            'identification' => $data['identification'],
            'identification_type' => $data['identification_type'],
            'photo_path' => $imagePath,
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'created_by' => auth()->user()->id,
            'password' =>  $data['password'],
            'rol_id' => $data['rol_id']
        ];

        $isValidUser = User::validateUser($user);

        if ($isValidUser->fails()) {
            return redirect()->route('colaboradores.create')
                ->withErrors($isValidUser);
        }

        $newUser = User::create($user);

        $collaborator = [
            "user_id" => $newUser->id,
            "company_id" => $data["company_id"],
            "area_id" => $data["area_id"],
            "job_title_id" => $data["job_title_id"],
            "location_id" => $data["location_id"],
        ];

        $isValidCollaborator = Collaborator::validateCollaborator($collaborator);

        if ($isValidCollaborator->fails()) {
            return redirect()->route('colaboradores.create')
                ->withErrors($isValidCollaborator);
        }

        $newCollaborator = Collaborator::create($collaborator);

        if ($newUser && $newCollaborator) {

            $saveImage = $this->saveImage($newUser, $data['photoDataInput']);

            EmailController::sendEmail(
                $newUser->email,
                'emails.first-password',
                [
                    'name' => $newUser->name . ' ' . $newUser->last_name,
                    'username' => $newUser->username,
                    'password' => $newUser->password,
                ]
            );

            return redirect()->route('colaboradores.index')
                ->with('success', 'Se ha creado el colaborador con exito');
        } else {
            return redirect()->route('colaboradores.index')
                ->with('error', 'No se pudo crear el colaborador');
        }
    }

    private function saveImage($user, $image, $update = false)
    {

        if ($update && $image == "/images/default.png") {
            unlink($user->photo_path);
            $user->photo_path = '/images/default.png';
        }

        if ($image == null) {
            $user->photo_path = '/images/default.png';
            return $user->update();
        }

        $photoData = preg_replace('/^data:image\/(jpeg|png|gif);base64,/', '', $image);
        $image = base64_decode($photoData);
        $fileName = uniqid() . '.png';

        $filePath = 'collaborators/images/' . $fileName;
        Storage::disk('public')->put($filePath, $image);

        $user->photo_path = "storage/" . $filePath;
        return $user->update();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $collaborator)
    {
        $dropDownsLists = getDropdownsList();
        $dropDownsLists +=  User::getUserRelationById($collaborator);

        return view('AccessControl.Collaborators.edit', $dropDownsLists);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $collaborator)
    {
        $user = User::getUserRelationById($collaborator)["user"];
        $data = $request->all();

        $user->name = $data["name"];
        $user->last_name = $data["last_name"];

        $user->collaborators->company->id = $data["company_id"];
        $user->collaborators->area->id = $data["area_id"];
        $user->collaborators->jobTitle->id  = $data["job_title_id"];
        $user->collaborators->location->id  = $data["location_id"];

        switch ($data["photoDataInput"]) {
            case 'null':
                break;
            case '/images/default.png':
                $user->photo_path = "/images/default.png";
                $userUpdated = $user->update();
            default:
                $userUpdated = $this->saveImage($user, $data["photoDataInput"], true);
                break;
        }

        if ($userUpdated) {
            return redirect()->route('colaboradores.index')
                ->with('success', 'Se actualizó el colaborador correctamente');
        } else {
            return redirect()->route('colaboradores.index')
                ->with('error', 'No se actualizó el colaborador correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $collaborator)
    {
        $collaboratorToDelete = User::find($collaborator);

        if ($collaboratorToDelete) {
            $collaboratorToDelete->is_active = false;
            $collaboratorToDelete->update();

            return redirect()->route('colaboradores.index')
                ->with('success', 'Se eliminó el colaborador correctamente');
        } else {
            return redirect()->route('colaboradores.index')
                ->with('error', 'No se encontró el usuario');
        }
    }

    public function getCollaboratorByIdentification(Request $request)
    {
        $data = $request->all();
        $identification = $data['collaborator']['identification'];
        $collaborator = User::where('identification', $identification)->get();
        $collaboratorSize = sizeof($collaborator);
        $response = [];
        $response['status'] = ($collaboratorSize > 0) ? 200 : 204;
        $response['data'] = ($collaboratorSize > 0) ? $collaborator : [];
        $response['msg'] = ($collaboratorSize > 0) ? 'Colaborador encontrado' : 'Colaborador no encontrado';

        return response()->json($response);
    }
}
