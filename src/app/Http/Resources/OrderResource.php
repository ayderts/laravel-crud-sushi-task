<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request):array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'fio' => $this->fio,
            'date' => date('d.m.Y', strtotime($this->date)),
            'total_sum' => $this->total_sum,
            'delivery_address' => $this->delivery_address,
        ];
    }
}
