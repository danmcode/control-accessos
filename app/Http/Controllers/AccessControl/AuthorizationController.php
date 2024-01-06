<?php

namespace App\Http\Controllers\AccessControl;

use App\Http\Controllers\Controller;
use App\Models\AccessControl\LoanComputer;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function index()
    {
        return view('AccessControl.Authorizations.index', [
            'loanComputers' => LoanComputer::where('is_active', true)->get(),
            'users' => User::where('is_active', true)->where('id', '!=', 1)->get(),
        ]
        );
    }
}