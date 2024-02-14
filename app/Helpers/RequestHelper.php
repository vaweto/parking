<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class RequestHelper
{

    public static function getDevice(Request $request)
    {
        return substr($request->userAgent() ?? '', 0, 255);
    }
}
