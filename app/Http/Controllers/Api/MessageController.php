<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Messages\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Repositories\MessageRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageController extends Controller
{
    /**
     * @var MessageRepository
     */
    protected $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    /**
     * Cria uma mensagem no banco de dados
     *
     * @param MessageRequest $request
     *
     * @return JsonResource
     */
    public function store(MessageRequest $request): JsonResource
    {
        $resource = $this->messageRepository->create($request->validated());

        return new MessageResource($resource);
    }
}
