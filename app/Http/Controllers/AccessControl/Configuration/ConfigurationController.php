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
use App\Models\AccessControl\EmailConfig;
use App\Models\AccessControl\Rol;
use App\Models\AccessControl\VisitorTypes;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('accessAGSJC', auth()->user());
        $companies = Company::where('is_active', '=', true)
            ->get();

        $areas = Area::where('is_active', '=', true)
            ->with('company')
            ->get();

        $jobTitles = JobTitle::where('is_active', '=', true)
            ->with('area')
            ->with('company')
            ->get();

        $locations = Location::where('is_active', '=', true)
            ->with('company')
            ->get();

        $identificationTypes = IdentificationType::where('is_active', '=', true)->get();

        $visitorTypes = VisitorTypes::where('is_active', '=', true)->get();
        $rols = Rol::where('is_active', '=', true)->get();
        $arls = Arl::where('is_active', '=', true)->get();
        $equipmentsTypes = EquipmentTypes::where('is_active', '=', true)->get();
        $vehiclesTypes = VehicleTypes::where('is_active', '=', true)->get();
        $workingHours = WorkingHours::getWorkingHours();
        $emailConfig = EmailConfig::getEmailConfig();

        return view('AccessControl.Configuration.index', [
            'companies' => $companies,
            'areas' => $areas,
            'jobTitles' => $jobTitles,
            'locations' => $locations,
            'identificationTypes' => $identificationTypes,
            'visitorTypes' => $visitorTypes,
            'arls' => $arls,
            'rols' => $rols,
            'vehiclestypes' => $vehiclesTypes,
            'equipmentstypes' => $equipmentsTypes,
            'workingHours' => $workingHours,
            'emailConfig' => $emailConfig,
        ]);
    }
}
