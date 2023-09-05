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

        $vehicleTypeCreated = vehicleTypes::create([
            'name'=>$data['name'],
            'created_by'=> auth()->user()->id,
        ]);

        if($vehicleTypeCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado el tipo de vehiculo con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear el tipo de vehiculo');
        }
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $vehicleTypes)
    {
        //update a identification type
        $vehicleTypeToUpdate = vehicleTypes::find($vehicleTypes);
        $data = $request->all();

        $vehicleTypeToUpdate->name = $data['name'];
        $vehicleTypeToUpdate->updated_by = auth()->user()->id;

        $vehicleTypeToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado el tipo de vehiculo');
    
    }

                /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $vehicleTypes)
    {
        // Soft delete
        $vehicleTypeToDelete = vehicleTypes::find($vehicleTypes);
        $vehicleTypeToDelete->is_active = false;
        $vehicleTypeToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado el tipo de equipo');
    }


}
