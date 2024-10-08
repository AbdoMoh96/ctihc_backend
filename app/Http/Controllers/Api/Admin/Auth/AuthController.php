<?php

namespace App\Http\Controllers\Api\Admin\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\AuthService;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService){}

    public function generateToken(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $token = $this->authService->generateAdminToken($admin);

            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function revokeToken(Request $request)
    {
        $admin = $request->user(); // assuming the user is authenticated via Sanctum

        $this->authService->revokeAdminToken($admin);

        return response()->json(['message' => 'Logged out successfully']);
    }
}
