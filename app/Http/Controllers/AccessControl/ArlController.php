<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Arl;
use Illuminate\Http\Request;

class ArlController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store a new arl
        $data = $request->all();

        $arlCreated = Arl::create([
            'name' => $data['name'],
            'created_by' => auth()->user()->id,
        ]);

        if($arlCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado la ARL con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear la ARL');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $arl)
    {
        //update a Arl
        $arlToUpdate = Arl::find($arl);
        $data = $request->all();

        $arlToUpdate->name = $data['name'];
        $arlToUpdate->updated_by = auth()->user()->id;

        $arlToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado la ARL');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $arl)
    {
        // Soft delete
        $arlToDelete = Arl::find($arl);
        $arlToDelete->is_active = false;
        $arlToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado la ARL');
    }
}
