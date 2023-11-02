<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AccessControl\Vehicles;
use App\Models\AccessControl\Visitors;
use App\Models\AccessControl\Collaborator;
use App\Models\AccessControl\IncomeExitVisitors;
use App\Models\AccessControl\Rol;

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

        $incomeExitVisitors = IncomeExitVisitors::where('date_time_out', '=', null)
            ->whereDate('date_time_in', Carbon::today())
            ->with('Visitor')
            ->with('VisitorType')
            ->with('Vehicle')
            ->with('Equipment')
            ->with('Collaborator')
            ->with('Visitor.IdentificationType')
            ->orderByRaw('ISNULL(date_time_out) DESC, date_time_out DESC')
            ->limit(30)
            ->get();


        foreach ($incomeExitVisitors as $incomeExitVisitor) {
            $collaborator = Collaborator::getCollaboratorRelationById($incomeExitVisitor->id_collaborator);
        }

        $count = $incomeExitVisitors->count();


        return view('home', [
            'users' => $users,
            'incomeExitVisitors' => $incomeExitVisitors,
            'count' => $count,
            'collaborator' => isset($collaborator) ? $collaborator : null
        ]);
    }
}
