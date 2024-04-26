<?php

namespace Transaction\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCreditCardResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'card_number' => $this->card_number,
            'expiration_date' => $this->expiration_date,
            'cvv' => $this->cvv,
        ];
    }
}
