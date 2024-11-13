<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
{
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MDPApp')->plainTextToken;
            $success['name'] = $user->name;
            return response()->json($success, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}



