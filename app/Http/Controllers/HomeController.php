<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AccessControl\Vehicles;
use App\Models\AccessControl\Visitors;
use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\IncomeExitVisitors;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('is_active', '=', true)
            ->where('id', '!=', 1)
            ->with('identificationTypes')
            ->with('collaborators.company')
            ->with('collaborators.area')
            ->with('collaborators.jobTitle')
            ->with('collaborators.location')
            ->get();

        $incomeExitVisitors = IncomeExitVisitors::whereDate('date_time_in', Carbon::today())
            ->with('Visitor')
            ->get();


        $visitors = Visitors::with('VisitorType')
            ->with('Vehicle')->get();

        $vehicles = Vehicles::with('VehicleType')->get();


        foreach ($incomeExitVisitors as $incomeExitVisitor) {
            $collaborator = Collaborator::getCollaboratorRelationById($incomeExitVisitor->visitor->id_collaborator);
        }

        return view('home', [
            'users' => $users,
            'visitors' => $visitors,
            'vehicles' => $vehicles,
            'incomeExitVisitors' => $incomeExitVisitors,
            'collaborator' => isset($collaborator) ? $collaborator : null
        ]);
    }
}
