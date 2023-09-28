<?php

namespace App\Http\Controllers\AccessControl\Configuration;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\Company;
use App\Models\AccessControl\Area;
use App\Models\AccessControl\Arl;
use App\Models\AccessControl\EquipmentTypes;
use App\Models\AccessControl\IdentificationType;
use App\Models\AccessControl\JobTitle;
use App\Models\AccessControl\Location;
use App\Models\AccessControl\VehicleTypes;
use App\Models\AccessControl\WorkingHours;
use App\Models\AccessControl\VisitorTypes;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all companies
        $companies = Company::where('is_active', '=', true)
            ->get();

        //get all areas
        $areas = Area::where('is_active', '=', true)
            ->with('company')
            ->get();
        
        //get all Job Titles
        $jobTitles = JobTitle::where('is_active', '=', true)
            ->with('area')
            ->with('company')
            ->get();

        //get all Job Titles
        $locations = Location::where('is_active', '=', true)
            ->with('company')
            ->get();
        
        //get all identifications types
        $identificationTypes = IdentificationType::where('is_active', '=', true)
            ->get();

        //get all arls
        $visitorTypes = VisitorTypes::where('is_active', '=', true)
            ->get();
        
        //get all arls
        $arls = Arl::where('is_active', '=', true)
            ->get();
        
        //get all Equipments types
        $equipmentsTypes = EquipmentTypes::where('is_active','=',true)
        ->get();

        //get all vehicles types
        $vehiclesTypes = VehicleTypes::where('is_active','=',true)
        ->get();

        //get Workig Hours
        $workingHours = WorkingHours::getWorkingHours();
 
        return view('AccessControl.Configuration.index', [
            'companies' => $companies,
            'areas' => $areas,
            'jobTitles' => $jobTitles,
            'locations' => $locations,
            'identificationTypes' => $identificationTypes,
            'visitorTypes' => $visitorTypes,
            'arls' => $arls,
            'vehiclestypes'=> $vehiclesTypes,
            'equipmentstypes'=> $equipmentsTypes,
            'workingHours' => $workingHours,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * SHOW THE DROPDOWN LIST
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}