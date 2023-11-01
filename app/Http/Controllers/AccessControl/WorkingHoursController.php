<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\WorkingHours;
use Illuminate\Http\Request;

class WorkingHoursController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;

        $isValidWorkingHours = WorkingHours::validateWorkingHours($data);
        
        if($isValidWorkingHours->fails()){
            return redirect()->route('configuration.index')
            ->withErrors($isValidWorkingHours);
        }

        $workingHoursCreated = WorkingHours::create($data);

        if ($workingHoursCreated) {
            return redirect()->route('configuration.index')
            ->with('success', 'Se han configurado las horas de ingreso y salida');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $workingHours)
    {
        $workingHours = WorkingHours::find($workingHours);
        $data = $request->all();
        $data['updated_by'] = auth()->user()->id;

        $isValidWorkingHours = WorkingHours::validateWorkingHours($data);
        
        if($isValidWorkingHours->fails()){
            return redirect()->route('configuration.index')
            ->withErrors($isValidWorkingHours);
        }

        $workingHours->time_in  = $data['time_in'];
        $workingHours->time_out = $data['time_out'];
        $workingHours->updated_by = $data['updated_by'];

        if($workingHours->update()){
            return redirect()->route('configuration.index')
            ->with('success', 'Se han actualizado las horas de ingreso y salida');
        }
    }
}
