<?php

namespace App\Http\Controllers\AccessControl;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AccessControl\Vehicles;
use App\Models\AccessControl\Visitors;
use App\Models\AccessControl\Equipments;
use Illuminate\Support\Facades\Validator;
use App\Models\AccessControl\IncomeExitVisitors;

class ValidateVisitorController extends Controller
{
    function validatevisitor(Request $request, $id)
    {
        $validar = Visitors::where('identification', '=', $request->validate_identification)->with('IdentificationType')->get();


        if ($validar->isEmpty()) {
            session()->forget('validar');
            session()->forget('Ingreso');
            return redirect()->route('crear-visitante', $id)->with('information', 'Registra el visitante para otorgarle el Ingreso');
        } else {
            $primerVisitante = $validar->first();
            $Exist_In = IncomeExitVisitors::where('date_time_out', '=', null)
                ->whereDate('date_time_in', Carbon::today())->where('visitor_id', '=', $primerVisitante->id)->get();
            if ($Exist_In->isEmpty()) {
                session()->put('validar', $validar);
                session()->put('Ingreso', true);
                session()->flash('information', 'Ingresa el visitante ya registrado');
                return redirect()->route('crear-visitante', $id);
            } else {
                session()->flash('error', 'El visitante aun se encuentra en las instalaciones, debes otorgarle salida');
                return redirect()->route('home');
            }
        }
    }

    function registerinvisitor(Request $request)
    {

        $id = $request['id_collaborator'];
        $data = $request->all();

        $validarVisitante = Validator::make($data, [
            'date_arl' => [
                'nullable',
                'date',
                'after:' . now(),
            ],
        ]);

        if ($validarVisitante->fails()) {
            $errorsString = $validarVisitante->errors()->all();
            return redirect()->route('crear-visitante', ['id' => $id])->withErrors($errorsString);
        }


        DB::transaction(function () use ($request) {
            try {
                $data = $request->all();

                $mark = $data['mark_car'];
                $placa = $data['Placa'];
                $color = $data['color'];

                $mark_eq = $data['mark'];
                $serial = $data['serial'];
                $description = $data['description'];



                if (!is_null($mark) && !is_null($placa) && !is_null($color)) {
                    //Insert into table Vehicle and equipment
                    $vehicle = new Vehicles();
                    $vehicle->mark = $mark;
                    $vehicle->placa = $placa;
                    $vehicle->color = $color;
                    $vehicle->vehicle_type_id = $data['vehicle_type'];

                    $vehicle->save();
                }

                if (!is_null($mark_eq) && !is_null($serial) && !is_null($description)) {
                    $equipment = new Equipments();
                    $equipment->mark = $mark_eq;
                    $equipment->serial = $serial;
                    $equipment->description = $description;
                    $equipment->equipment_type_id = $data['equipment_type'];

                    $equipment->save();
                }


                // Insert into table IncomeExitVisitor
                $Visitor_in = new IncomeExitVisitors();
                $Visitor_in->date_time_in = Carbon::now();
                $Visitor_in->date_time_out = null;
                $Visitor_in->observation = $data['observation'];
                $Visitor_in->visitor_id = $data['id_visitor'];
                $Visitor_in->created_by = auth()->user()->id;
                $Visitor_in->updated_by = null;
                $Visitor_in->registered_in_by = auth()->user()->id;
                $Visitor_in->registered_out_by = null;
                $Visitor_in->visitor_type_id = $data['typeVisitor'];
                $Visitor_in->company = $data['company'];
                $Visitor_in->arl_id = $data['arl'];
                $Visitor_in->date_arl = $data['date_arl'];
                $Visitor_in->remission = $data['remission'];
                $Visitor_in->equipment_id = isset($equipment->id) ? $equipment->id : null;
                $Visitor_in->vehicle_id = isset($vehicle->id) ? $vehicle->id : null;
                $Visitor_in->id_collaborator = $data['id_collaborator'];

                //Save in DB
                $Visitor_in->save();

                // Después de que la transacción sea exitosa
                DB::commit();

                // Establece un mensaje de éxito en la sesión
                session()->flash('success', 'Ingresado el Visitante Con Exito');

                // Para definir una variable de sesión 'success' con un mensaje:
            } catch (\Exception $error) {
                DB::rollBack();
                // Establece un mensaje de error en la sesión
                dd($error);
                //session()->flash('error', 'Ocurrio un error al ingresar el visitante.');
            }
        });

        return redirect()->route('visitantes-index');
    }
}
