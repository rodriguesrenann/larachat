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

    public function messagesFromId(int $id)
    {
        return $this->model->where(function ($query) use ($id) {
            $query->where('sender_id', auth()->user()->id);
            $query->where('receiver_id', $id);
        })
            ->orWhere(function ($query) use ($id) {
                $query->where('sender_id', $id);
                $query->where('receiver_id', auth()->user()->id);
            })
            ->with(['sender', 'receiver'])
            ->get();
    }
}
