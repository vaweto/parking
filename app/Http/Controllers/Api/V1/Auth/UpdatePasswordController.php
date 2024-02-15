<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UpdatePasswordController extends Controller
{
    public function __invoke(UpdatePasswordRequest $request)
    {
        try {
            auth()->user()->update($request->validated());
        } catch (\Exception $exception) {
            return response()->json('Error: '. $exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'password updated!'], Response::HTTP_ACCEPTED);
    }
}
