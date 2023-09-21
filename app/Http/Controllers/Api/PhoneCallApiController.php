<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhoneCallApiController extends Controller
{
    public function call(Request $request)
    {
        $phoneNumber = $request->phone_number;
        if (!$phoneNumber) return response()->json(['message' => 'number is required'], 403);
        return response()->json(["is_calling" => true, "phone_number" => $phoneNumber], 200);
    }
}
