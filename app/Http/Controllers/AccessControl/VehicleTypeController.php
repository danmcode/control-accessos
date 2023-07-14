<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccessControl\vehicleTypes;

class VehicleTypeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $equipmentTypeCreated = vehicleTypes::create([
            'name'=>$data['name'],
            'created_by'=> auth()->user()->id,
        ]);

        if($equipmentTypeCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado el tipo de vehiculo con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear el tipo de vehiculo');
        }
    }
}
