<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store a new Area
        $data = $request->all();
        //store a new room

        $locationCreated = Location::create([
            'name' => $data['name'],
            'company_id' => $data['company_id'],
            'created_by' => auth()->user()->id,
        ]);

        if($locationCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado la ubicación con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear la ubicación');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $location)
    {
        //Update a Location
        $locationToUpdate = Location::find($location);
        $data = $request->all();

        $locationToUpdate->name = $data['name'];
        $locationToUpdate->company_id = $data['company_id'];

        $locationToUpdate->updated_by = auth()->user()->id;

        $locationToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado la ubicación con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $location)
    {
        //Soft delete 
        $locationToDelete = Location::find($location);
        $locationToDelete->is_active = false;
        $locationToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado la Ubicación');
    }
}
