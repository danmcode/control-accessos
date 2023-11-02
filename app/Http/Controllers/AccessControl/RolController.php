<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{

    public function store(Request $request)
    {

        //Store a new vistor types
        $data = $request->all();

        $rolCreated = Rol::create([
            'name' => $data['name'],
            'created_by' => auth()->user()->id,
        ]);

        if ($rolCreated) {
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado el Rol con éxito');
        } else {
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear el Rol');
        }
    }

    public function update(Request $request, string $id)
    {
        //update a Rol
        $RolToUpdate = Rol::find($id);
        $data = $request->all();

        $RolToUpdate->name = $data['name'];
        $RolToUpdate->updated_by = auth()->user()->id;

        $RolToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado el Rol');
    }

    public function destroy(string $id)
    {
        // Soft delete
        $RolToDelete = Rol::find($id);
        $RolToDelete->is_active = false;
        $RolToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado el Rol');
    }
}
