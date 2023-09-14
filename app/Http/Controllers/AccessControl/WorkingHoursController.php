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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkingHours $workingHours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkingHours $workingHours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkingHours $workingHours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkingHours $workingHours)
    {
        //
    }
}
