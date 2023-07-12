<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\IdentificationType;
use Illuminate\Http\Request;

class IdentificationTypeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store a new identification type
        $data = $request->all();

        $identificationTypeCreated = IdentificationType::create([
            'initials' => $data['initials'],
            'name' => $data['name'],
            'created_by' => auth()->user()->id,
        ]);

        if($identificationTypeCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado el tipo de identificación con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear el tipo de identificación');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $identificationType)
    {
        //update a identification type
        $identificationTypeToUpdate = IdentificationType::find($identificationType);
        $data = $request->all();

        $identificationTypeToUpdate->initials = $data['initials'];
        $identificationTypeToUpdate->name = $data['name'];
        $identificationTypeToUpdate->updated_by = auth()->user()->id;

        $identificationTypeToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado el tipo de identificación');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identificationType)
    {
        // Soft delete
        $identificationTypeToDelete = IdentificationType::find($identificationType);
        $identificationTypeToDelete->is_active = false;
        $identificationTypeToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado el tipo de identificación');
    }
}
