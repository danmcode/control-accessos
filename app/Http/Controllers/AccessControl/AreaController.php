<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store a new Area
        $data = $request->all();
        //store a new room

        $areaCreated = Area::create([
            'name' => $data['name'],
            'company_id' => $data['company_id'],
            'created_by' => auth()->user()->id,
        ]);

        if($areaCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado el área con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear el área');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $area)
    {
        //Update an Area
        $areaToUpdate = Area::find($area);
        $data = $request->all();

        $areaToUpdate->name = $data['name'];
        $areaToUpdate->company_id = $data['company_id'];

        $areaToUpdate->updated_by = auth()->user()->id;

        $areaToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado el área con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $area)
    {
        //Soft delete 
        $areaToDelete = Area::find($area);
        $areaToDelete->is_active = false;
        $areaToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado la sala');
    }
}