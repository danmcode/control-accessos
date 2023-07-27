<?php

namespace App\Http\Controllers\AccessControl;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccessControl\EquipmentTypes;

class EquipmentTypeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $equipmentTypeCreated = EquipmentTypes::create([
            'name'=>$data['name'],
            'created_by'=> auth()->user()->id,
        ]);

        if($equipmentTypeCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado el tipo de equipo con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear el tipo de equipo');
        }
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $equipmentTypes)
    {
        //update a identification type
        $equipmentTypeToUpdate = EquipmentTypes::find($equipmentTypes);
        $data = $request->all();

        $equipmentTypeToUpdate->name = $data['name'];
        $equipmentTypeToUpdate->updated_by = auth()->user()->id;

        $equipmentTypeToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado el tipo de equipo');
    
    }

            /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $equipmentTypes)
    {
        // Soft delete
        $equipmentTypeToDelete = EquipmentTypes::find($equipmentTypes);
        $equipmentTypeToDelete->is_active = false;
        $equipmentTypeToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado el tipo de equipo');
    }
}
