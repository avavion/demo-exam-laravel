<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin(SignInRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $response = [
                'data' => [
                    'token' => $request->user()->createToken('avavion')->plainTextToken
                ]
            ];

            return response()->json($response);
        }


        return response()->json(
            [
                'data' => [
                    'message' => 'User is not found',
                    'errors' => [
                        'email' => ['Incorrect login date']
                    ]
                ]
            ],
            422
        );
    }

    public function signup(SignUpRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($request->get('password'));

        $user = User::query()->create($validated);

        return UserResource::make(User::find($user->id));
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
