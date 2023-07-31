<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Collaborator;
use Illuminate\Http\Request;

use App\Models\AccessControl\IncomeExitCollaborators;

class IncomeExitCollaboratorsController extends Controller
{
    //
    function index() {
        
        //Get all in and collaborator Income Output
        $incomeOutputs = IncomeExitCollaborators::get();

        return view('IncomeOutput.index', [
            'incomeOutputs' => $incomeOutputs,
        ]);

    }

    function setIncomeCollaborator(string $id, Request $request) {

        $collaborator = Collaborator::find($id);

        if(!$collaborator){
            return redirect()->route('home')
            ->with('error', 'El usuario no existe');
        }

        // Obetener los ingresos y salidas actuales del colaborador
        $incomeOutPut = IncomeExitCollaborators::where('collaborator_id', '=', $collaborator->id)
            ->whereDate('date_time_in', '=', now()->toDateString())
            ->orWhereDate('date_time_out', '=', null)
            ->get();
        
        dd($incomeOutPut);

        $observation = isset($request->all()['observation']) 
        ? $request->all()['observation']
        : '';

        $setIncome = IncomeExitCollaborators::create([
            'date_time_in' => date_create()->format('Y-m-d H:i:s'),
            'collaborator_id' => $collaborator->id,
            'created_by' => auth()->user()->id,
            'registered_in_by' => auth()->user()->id,
            'observation' => $observation,
            'out_of_time' => 0,
        ]);

        if($setIncome){
            return redirect()->route('home')
            ->with('success', 'Se registró el ingreso correctamente');
        }else{
            return redirect()->route('home')
            ->with('error', 'No se pudo registrar el ingreso');
        }
        
    }

    function setOutputCollaborator(Collaborator $id) {

        $collaborator = Collaborator::find($id);

        if(!$collaborator){
            return redirect()->route('home')
            ->with('error', 'El usuario no existe');
        }

        //TODO: Agregar en la base de datos la observación de salida

        // Buscar el ingreso registro de ingreso y salida del colaborador
        

        // Si hay un ingreso y la salida es null registrar salida
        

    }
}