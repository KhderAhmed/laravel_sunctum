<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email',
            "password" => 'required|same:password',
            "confirm_password" => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation Errors",
                "data" => $validator->errors()->all()
            ]);
            //     # code...
        }
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        $response = [];
        $response['token'] = $user->createToken("ApiToken")->plainTextToken;
        $response['name'] = $user->name;
        $response['email'] = $user->email;

        return response()->json([
            "status" => 1,
            "message" => "User Registerd Successfully",
            "data" => $response,
        ]);
    }
    public function login(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $user = Auth::user();
            $response = [];
            $response['token'] = $user->createToken("ApiToken")->plainTextToken;
            $response['name'] = $user->name;
            $response['email'] = $user->email;

            return response()->json([
                "status" => 1,
                "message" => "User Loggied Successfully",
                "data" => $response,
            ]);
        }
        return response()->json([
            "status" => 0,
            "message" => "authintcuted Errors",
            "data" => null
        ]);
        # code...

}
}

// "status": 1,
// "message": "User Registerd Successfully",
// "data": {
//     "token": "1|ND79DPlGcGj7CxGgEFnE36E8a5X5PqCSNVaHRpL35a2917dd",
//     "name": "khder",
//     "email": "khder@gmail.com"
// }
