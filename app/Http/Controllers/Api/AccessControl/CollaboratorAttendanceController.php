<?php

namespace App\Http\Controllers\Api\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Collaborator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class CollaboratorAttendanceController extends Controller
{
    const INCOME = 'income';
    const EXIT = 'exit';

    public function determineIncomeOrExit(Request $request): JsonResponse
    {
        $data = $request->all();
        $isValidIdentification = Validator::make($data, [
            'identification' => 'required'
        ]);

        if($isValidIdentification->fails()){
            return response()->json([
                'message' => 'La identificación es requerida',
                'errors' => $isValidIdentification->errors()
            ], 400);
        }

        $user = User::getUserRelationByIdentification($data['identification']);

        if($user === []){
            return response()->json([
                'message' => 'El colaborador no existe',
                'errors' => [],
                'details' => []
            ], 400);
        }

        $collaboratorIncomesAndExit = Collaborator::getIncomeExitCollaboratorsById($user->collaborators->id);

        if(sizeof($collaboratorIncomesAndExit) === 0){
            return response()->json([
                'message' => 'Ingreso',
                'errors' => [],
                'details' => []
            ], 200);
        }

        if($collaboratorIncomesAndExit[0]->date_time_in && $collaboratorIncomesAndExit[0]->date_time_out){
            return response()->json([
                'message' => 'Ingreso',
                'errors' => [],
                'details' => []
            ], 200);
        }

        if($collaboratorIncomesAndExit[0]->date_time_in && !$collaboratorIncomesAndExit[0]->date_time_out){
            return response()->json([
                'message' => 'Salida',
                'errors' => [],
                'details' => []
            ], 200);
        }

        return $user->id;
    }
}
