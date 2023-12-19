<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        
        $token = $user->createToken('api_token')->plainTextToken;

        return UserResource::make($user)->additional(['token' => $token]);

    }


}


// return $resource;
        // $resource = new UserResource($user);
        // $resource = $resource->additional(['token' => $token]);
        // return $resource;
