<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginApiController extends Controller
{
    public function  apiAuth(Request $request) : JsonResponse
    {
        $credentials = $request->all();

        $isValidUser = Validator::make($credentials, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        if($isValidUser->fails()){
            return response()->json([
                'message' => 'Campos requeridos faltantes',
                'errors' => $isValidUser->errors(),
                'details' => []
            ], 400);
        }

        if (Auth::attempt($credentials)) {
            $user = User::where('username', $request->username)->first();
            $token = $user->createToken(getenv('APP_TOKEN'))->plainTextToken;
            return response()->json([
                'message' => 'Usuario autenticado correctamente',
                'details' => $user,
                'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
}
