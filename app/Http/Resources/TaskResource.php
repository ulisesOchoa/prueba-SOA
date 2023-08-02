<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'name' => $this->name,
            'description' => $this->description,
            'priority' => $this->priority,
            'assigned_to' => [
                'id' => (string)$this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email
            ]
        ];
    }
}
