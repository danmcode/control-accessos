<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\LoanComputer;
use Illuminate\Http\Request;

class LoanComputerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $loanComputerCreated = LoanComputer::create([
            'computer_name' => $data['computer_name'],
            'brand' => $data['brand'],
            'serial' => $data['serial'],
            'created_by' => auth()->user()->id,
        ]);

        if($loanComputerCreated){
            return redirect()->route('authorization')
                ->with('success', 'Se ha creado la empresa con éxito');
        }else{
            return redirect()->route('authorization')
                ->with('error', 'No se pudo crear la empresa');
        }
    }

    public function update(Request $request, string $loanComputer)
    {
        $loanComputerToUpdate = LoanComputer::find($loanComputer);
        $data = $request->all();

        $loanComputerToUpdate->computer_name = $data['computer_name'];
        $loanComputerToUpdate->brand = $data['brand'];
        $loanComputerToUpdate->serial = $data['serial'];

        $loanComputerToUpdate->updated_by = auth()->user()->id;
        $loanComputerToUpdate->update();

        return redirect()->route('authorization')
        ->with('success', 'Se ha actualizado el registro con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $loanComputer)
    {
        $loanComputerToDelete = LoanComputer::find($loanComputer);
        $loanComputerToDelete->is_active = false;
        $loanComputerToDelete->update();

        return redirect()->route('authorization')
            ->with('success', 'Se ha eliminado el registro');
    }
}
