<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceOrderResource extends JsonResource
{
    /**
     * Organiza e formata os dados do modelo ServiceOrder
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'vehiclePlate' => $this->vehiclePlate,
            'price' => $this->price,
            'priceType' => $this->priceType,
            'entryDateTime' => $this->entryDateTime,
            'exitDateTime' => $this->exitDateTime,
            'userId' => new UserResource(User::find($this->userId))
        ];
    }
}
