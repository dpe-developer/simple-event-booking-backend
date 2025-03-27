<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function user(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }

    public function register(AuthRequest $request): JsonResponse
    {
        return response()->json($this->authService->register($request->validated()), 201);
    }

    public function login(AuthRequest $request): JsonResponse
    {
        /* return response()->json([
            'method' => request()->isMethod('post'),
            'route' => request()->routeIs('/api/v1/auth/login'),
            'url' => request()->path()
        ]); */
        // return response()->json(['token' => $this->authService->login($request->validated())]);
        try {
            $credentials = $request->validated();
            $token = $this->authService->login($credentials);
    
            if (!$token) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
    
            return response()->json([
                'user' => Auth::user(),
                'token' => $token,
                'token_type' => 'Bearer'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred during login'], 500);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        return $this->authService->logout($request);
    }
}
