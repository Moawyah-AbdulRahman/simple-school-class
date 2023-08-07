<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDerailsResource;
use App\Http\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller {

    private AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function login(Request $request) {
        $validatedRequest = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $accessToken = $this->authService->login($validatedRequest);

        return [
            "accessToken" => $accessToken
        ];
    }

    public function register(Request $request) {

        $validatedRequest = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'password' => 'required|confirmed',
            'type' => 'required|in:student,teacher'
        ]);

        $entity = $this->authService->register($validatedRequest);
        return UserDerailsResource::make($entity);
    }

    public function me(Request $request) {
        return UserDerailsResource::make($this->authService->details());
    }
}
