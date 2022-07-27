<?php

namespace App\Http\Controllers\Api;

use App\Events\NewMessageCreated;
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

        event(new NewMessageCreated($resource));

        return new MessageResource($resource);
    }

    /**
     * Recupera as mensagens do usuário logado com usuario do id
     *
     * @param int $id
     *
     * @return JsonResource
     */
    public function show(int $id): JsonResource
    {
        $resource = $this->messageRepository->messagesFromId($id);

        return MessageResource::collection($resource);
    }
}
