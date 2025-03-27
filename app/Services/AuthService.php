<?php

// AuthService
namespace App\Services;

use App\Repositories\AuthRepository;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register($data)
    {
        return $this->authRepository->register($data);
    }

    public function login($data)
    {
        return $this->authRepository->login($data);
    }

    public function logout($request)
    {
        return $this->authRepository->logout($request);
    }
}