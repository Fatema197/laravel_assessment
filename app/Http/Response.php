<?php

namespace App\Http\Responses;

class ApiResponse
{
    /**
     * Return a successful response.
     */
    public static function success($data, $message = 'Operation successful', $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Return an error response.
     */
    public static function error($message = 'An error occurred', $code = 500, $errors = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors
        ], $code);
    }

    /**
     * Return a validation error response.
     */
    public static function validationError($message = 'Validation failed', $errors, $code = 422)
    {
        return self::error($message, $code, $errors);
    }
}
