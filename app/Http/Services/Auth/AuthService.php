<?php

namespace App\Http\Services\Auth;

interface AuthService {
    public function login($validatedRequest);
    public function register($validatedRequest);
}