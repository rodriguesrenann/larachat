<?php

namespace App\Repositories\Contracts;

interface MessageRepositoryInterface
{
    public function create(array $data);
    public function messagesFromId(int $id);
}
