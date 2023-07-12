<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store a new JobTitle
        $data = $request->all();
        //store a new room

        $jobTitleCreated = JobTitle::create([
            'name' => $data['name'],
            'area_id' => $data['area_id'],
            'company_id' => $data['company_id'],
            'created_by' => auth()->user()->id,
        ]);

        if($jobTitleCreated){
            return redirect()->route('configuration.index')
                ->with('success', 'Se ha creado el cargo con éxito');
        }else{
            return redirect()->route('configuration.index')
                ->with('error', 'No se pudo crear el cargo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $jobTitle)
    {
      //Update an Job Title
      $jobTitleToUpdate = JobTitle::find($jobTitle);
      $data = $request->all();

      $jobTitleToUpdate->name = $data['name'];
      $jobTitleToUpdate->area_id = $data['area_id'];
      $jobTitleToUpdate->company_id = $data['company_id'];

      $jobTitleToUpdate->updated_by = auth()->user()->id;

      $jobTitleToUpdate->update();

      return redirect()->route('configuration.index')
          ->with('success', 'Se ha actualizado el cargo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $jobTitle)
    {
        //Soft delete 
        $jobTitleToDelete = JobTitle::find($jobTitle);
        $jobTitleToDelete->is_active = false;
        $jobTitleToDelete->update();

        return redirect()->route('configuration.index')
            ->with('success', 'Se ha eliminado el cargo');
    }
}
