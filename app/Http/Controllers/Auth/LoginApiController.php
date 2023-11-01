<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Responses\HttpStatusCode;
use App\Http\Responses\PJsonResponse;
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
            PJsonResponse::error(
                'Campos Requeridos Faltantes',
                HttpStatusCode::HTTP_BAD_REQUEST,
                $isValidUser->errors()
            );
        }

        if (Auth::attempt($credentials)) {
            $user = User::where('username', $request->username)->first();
            $token = $user->createToken(getenv('APP_TOKEN'))->plainTextToken;

            $data = ['user' => $user, 'token' => $token];

            return PJsonResponse::success(
                $data,
                'Usuario autenticado correctamente',
                HttpStatusCode::HTTP_OK
            );

        } else {
            return PJsonResponse::error(
                'Autenticación fallida',
                HttpStatusCode::HTTP_BAD_REQUEST,
                $isValidUser->errors()
            );
        }
    }
}
