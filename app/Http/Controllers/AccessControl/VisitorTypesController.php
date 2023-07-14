<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\VisitorTypes;
use Illuminate\Http\Request;

class VisitorTypesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store a new vistor types
        $data = $request->all();

        $visitorTypeCreated = VisitorTypes::create([
            'name' => $data['name'],
            'created_by' => auth()->user()->id,
        ]);

        if($visitorTypeCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado el tipo de visitante con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear el tipo de visitante');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $visitorTypes)
    {
        //update a identification type
        $visitorTypeToUpdate = VisitorTypes::find($visitorTypes);
        $data = $request->all();

        $visitorTypeToUpdate->name = $data['name'];
        $visitorTypeToUpdate->updated_by = auth()->user()->id;

        $visitorTypeToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado el tipo de visitante');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $visitorTypes)
    {
        // Soft delete
        $visitorTypeToDelete = VisitorTypes::find($visitorTypes);
        $visitorTypeToDelete->is_active = false;
        $visitorTypeToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado el tipo de visitante');
    }
}
