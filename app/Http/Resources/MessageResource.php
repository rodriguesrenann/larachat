<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'sender' => new UserResource($this->sender),
            'receiver' => new UserResource($this->receiver),
            'message' => $this->message,
            'date' => Carbon::make($this->created_at)->format('d/m/Y H:i')
        ];
    }
}
