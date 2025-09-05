<?php

namespace App\Http\Resources\Gift;

use App\Helpers\DateHelper;
use App\Http\Resources\Contact\ContactShort as ContactShortResource;
use App\Http\Resources\Photo\Photo as PhotoResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class Gift extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'object' => 'gift',
            'name' => $this->name,
            'comment' => $this->comment,
            'url' => $this->url,
            'amount' => $this->amount,
            'value' => $this->value,
            'amount_with_currency' => $this->displayValue,
            'status' => $this->status,
            'date' => DateHelper::getDate($this->date),
            'recipient' => new ContactShortResource($this->recipient),
            'photos' => PhotoResource::collection($this->photos),
            'contact' => new ContactShortResource($this->contact),
            'account' => [
                'id' => $this->account_id,
            ],
            'created_at' => DateHelper::getTimestamp($this->created_at),
            'updated_at' => DateHelper::getTimestamp($this->updated_at),
        ];
    }
}
