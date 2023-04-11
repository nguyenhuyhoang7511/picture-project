<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends BaseController
{
    public function register(Request $request)
    {
        try {
            $request->validate(
                [
                    "name" => "required|max:50",
                    "email" => "email|required",
                    "password" => "required|min:8|max:16",
                    "confirm_password" => "required|same:password",
                ]
            );

            $newUser = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
            ]);

            $token = $newUser->createToken(env('APP_NAME'))->plainTextToken;

            return $this->sendResponse($token, "Register success");
        } catch (\Throwable $err) {
            return $this->sendError($err->getMessage(), 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "email" => "required|email",
                "password" => "required"
            ]);
            if ($validator->fails()) {
                return $this->sendError("Validator Error", 401);
            }

            // Different# : (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return $this->sendError([], 'User not found');
            }
            $user = User::where('email', $request->email)->first();

            // Check password
            if (!Hash::check($request->password, $user->password, [])) {
                return $this->sendError([], 'Password is not correct');
            }

            $tokenResult = $user->createToken(env('APP_NAME'))->plainTextToken;

            return $this->sendResponse($tokenResult, "Login success");
        } catch (\Throwable $err) {
            return $this->sendError($err->getMessage(), 500);
        }
    }
}
