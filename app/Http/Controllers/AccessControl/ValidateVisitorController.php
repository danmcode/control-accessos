<?php

namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidateVisitorController extends Controller
{
    function validatevisitor(Request $request, $id)
    {
        dd($request->validate_identification);
        /* $validar = Visitor::where('identification','=',$request->) */
    }
}
