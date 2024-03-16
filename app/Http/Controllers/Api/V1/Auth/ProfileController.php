<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Auth
 */
class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return response()->json($request->user()->only(['id', 'name', 'email', 'email_verified_at']));
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            auth()->user()->update($request->validated());
        } catch (\Exception $exception) {
            return response()->json('Error: '. $exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'profile updated!'], Response::HTTP_ACCEPTED);

    }
}
