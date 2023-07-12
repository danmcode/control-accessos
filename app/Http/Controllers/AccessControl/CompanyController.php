<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guardar una nueva empresa
        $data = $request->all();

        $companyCreated = Company::create([
            'name' => $data['name'],
            'nit' => $data['nit'],
            'created_by' => auth()->user()->id,
        ]);

        if($companyCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado la empresa con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear la empresa');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $company)
    {
        //update a company
        $companyToUpdate = Company::find($company);
        $data = $request->all();

        $companyToUpdate->name = $data['name'];
        $companyToUpdate->nit = $data['nit'];
        $companyToUpdate->updated_by = auth()->user()->id;

        $companyToUpdate->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha actualizado la empresa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $company)
    {
        // Soft delete
        $companyToDelete = Company::find($company);
        $companyToDelete->is_active = false;
        $companyToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado la empresa');
    }
}
