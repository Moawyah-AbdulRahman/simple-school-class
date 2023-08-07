<?php

namespace App\Http\Services\Auth;

use App\Exceptions\BusinessException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Services\Auth\AuthService;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthServiceImpl implements AuthService {

    public function login($validatedRequest) {
        $user = User::all()->where('email', '=', $validatedRequest['email'])->first();
        if($user == null || !Hash::check($validatedRequest['password'], $user->password)){
            throw new BusinessException('Bad Credentials.', 401);
        }
        return auth()->login($user);
    }

    public function register($validatedRequest) {
        $user = User::create([
            'email' => $validatedRequest['email'],
            'password' => Hash::make($validatedRequest['password'])
        ]);

        $entity_data = [
            'first_name' => $validatedRequest['first_name'],
            'last_name' => $validatedRequest['last_name'],
            'phone_number' => $validatedRequest['phone_number']
        ];

        $entity = ($validatedRequest['type'] === 'student')? 
            new Student($entity_data): 
            new Teacher($entity_data);
        $entity->user_id = $user->id;

        $entity->save();
        $entity->type = $validatedRequest['type'];

        return $entity;
    }

    public function details() {
        $payload = JWTAuth::payload();
        $type = $payload['user_type'];
        $result = null;
        if($type === 'student'){
            $result = Student::where('user_id', $payload['sub'])->first();
        } else if ($type === 'teacher'){
            $result = Teacher::where('user_id', $payload['sub'])->first();
        }
        $result->type = $type;
        return $result;
    }
}