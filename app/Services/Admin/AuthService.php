<?php

namespace App\Services\Admin;


class AuthService
{
    public function generateAdminToken($admin): string
    {
        // Generate a new token for the admin
        $token = $admin->createToken('admin-token', ['*'])->plainTextToken;

        return $token;
    }

    public function revokeAdminToken($admin): void
    {
        // Revoke all tokens for the admin
        $admin->tokens()->delete();
    }
}
