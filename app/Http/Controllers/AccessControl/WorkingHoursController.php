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

        $workingHoursCreated = WorkingHours::create($data);

        if ($workingHoursCreated) {
            return redirect()->route('configuration.index')
            ->with('success', 'Se han configurado las horas de ingreso y salida');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkingHours $workingHours)
    {
        //
    }

}
