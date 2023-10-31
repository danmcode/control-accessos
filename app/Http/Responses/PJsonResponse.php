<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class PJsonResponse
{
    public static function success($data = [], $message = 'Success', $count = 0, $status = 200): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'count' => $count,
            'data' => $data,
        ], $status);
    }

    public static function error($message, $status = 400, $errors = []): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
