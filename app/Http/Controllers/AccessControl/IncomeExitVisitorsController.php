<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccessControl\IncomeExitVisitors;
use App\Models\AccessControl\Visitors;
use Carbon\Carbon;

class IncomeExitVisitorsController extends Controller
{
    function setOutputVisitor(Request $request, string $id)
    {

        $incomeOutPut = IncomeExitVisitors::where('visitor_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();

        // Buscar el ingreso registro de ingreso y salida del colaborador

        if (sizeof($incomeOutPut) != 0) {

            $lastIncome = "No se ha registrado el ingreso al visitante";

            if ($incomeOutPut[0]->date_time_out != null) {
                return redirect()->route('visitantes-index')->with('error', $lastIncome);
            }

            $observation = isset($request->all()['observation'])
                ? $request->all()['observation']
                : '';

            $incomeOutPut[0]->date_time_out = now();
            $incomeOutPut[0]->observation = $incomeOutPut[0]->observation .
                "\nSalida: \n" . $observation;
            $incomeOutPut[0]->updated_by = auth()->user()->id;
            $incomeOutPut[0]->registered_out_by = auth()->user()->id;
            $incomeOutPut[0]->update();

            return redirect()->route('visitantes-index')->with('success', 'Se ha registrado la salida');
        }
    }
}
