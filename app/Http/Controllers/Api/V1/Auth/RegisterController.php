<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\RequestHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;

/**
 * @group Auth
 */
class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        event(new Registered($user));

        $device = RequestHelper::getDevice($request);

        return response()->json([
           'access_token' => $user->createToken($device)->plainTextToken,
        ], Response::HTTP_CREATED);
    }
}
