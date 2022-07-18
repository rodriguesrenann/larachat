<?php

namespace App\Repositories;

use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryInterface;

class MessageRepository implements MessageRepositoryInterface
{
    protected $model;

    public function __construct(Message $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create([
            'receiver_id' => $data['receiver_id'],
            'sender_id' => auth()->user()->id,
            'message' => $data['message']
        ]);
    }
}
