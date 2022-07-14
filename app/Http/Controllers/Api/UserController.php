<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    /**
     * @var UserRepository $userRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Retorna todos os usuários
     *
     * @return JsonResource
     */
    public function index(): JsonResource
    {
        $resource = $this->userRepository->getAll();

        return UserResource::collection($resource);
    }
}
