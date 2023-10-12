<?php

namespace App\Http\Controllers\Api\AccessControl;

use App\Http\Controllers\Controller;
use App\Http\Responses\HttpStatusCode;
use App\Http\Responses\PJsonResponse;
use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\IncomeExitCollaborators;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class CollaboratorAttendanceController extends Controller
{
    const INCOME = 'Ingreso';
    const EXIT = 'Salida';

    public function setCollaboratorAttendance(Request $request) : JsonResponse
    {
        $data = $request->all();

        $isValidIdentification = User::validateIdentification($data);

        if ($isValidIdentification->fails()){
            return PJsonResponse::error(
                'No se pudo validar los campos',
                HttpStatusCode::HTTP_BAD_REQUEST,
                $isValidIdentification->errors()
            );
        }

        $incomeOrExit = $this->determineIncomeOrExit($data['identification']);

        return match ($incomeOrExit['message']) {
            self::INCOME => $this->setIncome($incomeOrExit['user']),
            self::EXIT => $this->setExit($incomeOrExit['incomeAndExits'], $incomeOrExit['user']),
            default => PJsonResponse::error(
                'No se pudo realizar el registro',
                HttpStatusCode::HTTP_BAD_REQUEST,
                errors: $incomeOrExit['message'],
            ),
        };
    }

    public function determineIncomeOrExit(string $identification) : array
    {
        $user = User::getUserRelationByIdentification($identification);

        if($user === []) return ['message' => 'El colaborador no existe', 'user' => []];

        $collaboratorIncomesAndExits = Collaborator::getIncomeExitCollaboratorsById($user->collaborators->id);

        if(sizeof($collaboratorIncomesAndExits) === 0) return [
            'message' => self::INCOME,
            'user' => $user,
            'incomeAndExits' => []
        ];

        if($collaboratorIncomesAndExits[0]->date_time_in && $collaboratorIncomesAndExits[0]->date_time_out)
            return [
                'message' => self::INCOME,
                'user' => $user,
                'incomeAndExits' => $collaboratorIncomesAndExits[0]
            ];

        if($collaboratorIncomesAndExits[0]->date_time_in && !$collaboratorIncomesAndExits[0]->date_time_out)
            return [
                'message' => self::EXIT,
                'user' => $user,
                'incomeAndExits' => $collaboratorIncomesAndExits[0]
            ];

        return [ 'message' => '', 'user' => [] ];
    }

    public function setIncome($user) : JsonResponse
    {
        $observation = '';

        $setIncome = IncomeExitCollaborators::create([
            'date_time_in' => date_create()->format('Y-m-d H:i:s'),
            'collaborator_id' => $user->collaborators->id,
            'created_by' => auth()->user()->id,
            'registered_in_by' => auth()->user()->id,
            'observation' => self::INCOME . ":\n" . $observation . "\n",
            'out_of_time' => 0,
        ]);

        $data = ['user' => $user, 'income' => $setIncome];

        if($setIncome){
            return PJsonResponse::success(
                $data,
                "Registro de " . self::INCOME . " Exitoso",
                HttpStatusCode::HTTP_OK,
            );
        }else{
            return PJsonResponse::error("No se pudo registrar" . self::INCOME);
        }
    }

    public function setExit($incomeAndExits, $user) : JsonResponse
    {
        $observation = '';

        $incomeAndExits->date_time_out = date_create()->format('Y-m-d H:i:s');
        $incomeAndExits->observation = $incomeAndExits->observation .
            "\nSalida: \n" . $observation;
        $incomeAndExits->updated_by = auth()->user()->id;

        if($incomeAndExits->update()){
            return PJsonResponse::success(
                [ 'user' => $user, 'incomeAndExits' => $incomeAndExits],
                "Registro de " . self::EXIT . " Exitoso",
                HttpStatusCode::HTTP_OK,
            );
        }else{
            return PJsonResponse::error("No se pudo registrar" . self::EXIT);
        }
    }
}
