<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Collaborator;
use Illuminate\Http\Request;
use App\Models\AccessControl\IncomeExitCollaborators;

class IncomeExitCollaboratorsController extends Controller
{
    public function index()
    {
        return view('AccessControl.IncomeOutput.index', [
            'incomeOutputs' => Collaborator::getIncomeExitCollaborators(),
        ]);
    }

    function setIncomeCollaborator(string $id, Request $request)
    {
        $collaborator = Collaborator::find($id);

        if (!$collaborator) {
            return redirect()->route('home')
                ->with('error', 'El usuario no existe');
        }

        $incomeOutPut = IncomeExitCollaborators::where('collaborator_id', '=', $collaborator->id)
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();

        if (sizeof($incomeOutPut) != 0) {

            $date = date('d-M-Y', strtotime($incomeOutPut[0]->date_time_in));
            $hour = date('H:i:s', strtotime($incomeOutPut[0]->date_time_in));

            $lastIncome = "No se le ha dado la salida al colaborador del día: \n$date, a las: $hour. \nregistrar salida e intentarlo nuevamente.";

            if ($incomeOutPut[0]->date_time_out == null) {
                return redirect()->route('home')->with('error', $lastIncome);
            }

            return $this->createCollaboratorIncome($request, $collaborator);
        } else {
            return $this->createCollaboratorIncome($request, $collaborator);
        }
    }

    private function createCollaboratorIncome(Request $request, Collaborator $collaborator)
    {
        $observation = isset($request->all()['observation'])
            ? $request->all()['observation']
            : '';

        $setIncome = IncomeExitCollaborators::create([
            'date_time_in' => date_create()->format('Y-m-d H:i:s'),
            'collaborator_id' => $collaborator->id,
            'created_by' => auth()->user()->id,
            'registered_in_by' => auth()->user()->id,
            'observation' => "Ingreso: \n" . $observation . "\n",
            'out_of_time' => 0,
        ]);

        if ($setIncome) {
            return redirect()->route('home')
                ->with('success', 'Se registró el ingreso correctamente');
        } else {
            return redirect()->route('home')
                ->with('error', 'No se pudo registrar el ingreso');
        }
    }

    function setOutputCollaborator(Request $request, string $id, string $view = null)
    {

        $collaborator = Collaborator::find($id);

        if (!$collaborator) {
            return redirect()->route('home')
                ->with('error', 'El usuario no existe');
        }

        $incomeOutPut = IncomeExitCollaborators::where('collaborator_id', '=', $collaborator->id)
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();

        if (sizeof($incomeOutPut) != 0) {

            $lastIncome = "No se ha registrado el ingreso al colaborador";

            if ($incomeOutPut[0]->date_time_out != null) {
                return redirect()->route('home')->with('error', $lastIncome);
            }

            $observation = isset($request->all()['observation'])
            ? $request->all()['observation']
            : '';

            $incomeOutPut[0]->date_time_out = date_create()->format('Y-m-d H:i:s');
            $incomeOutPut[0]->observation = $incomeOutPut[0]->observation .
            "\nSalida: \n" . $observation;
            $incomeOutPut[0]->updated_by = auth()->user()->id;
            $incomeOutPut[0]->update();

            if($view) return redirect()->route('ingresos-salidas.index')->with('success', 'Se ha registrado la salida');

            return redirect()->route('home')->with('success', 'Se ha registrado la salida');

        }
    }
}
