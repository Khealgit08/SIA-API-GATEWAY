<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    protected function successResponse($data, $code = Response::HTTP_OK)
    {
        //return response()->json(['data' => $data], $code);
        return response($data, $code)->header('Content-Type','application/json');
    }

    protected function errorResponse($message, $code)
    {
        //return response()->json(['error' => $message, 'code' => $code], $code);
        return response($message, $code)->header('Content-Type','application/json');
    }
}
