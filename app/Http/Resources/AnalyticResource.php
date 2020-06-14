<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AnalyticTypeResource;
use App\Http\Resources\PropertyResource;

class AnalyticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => new AnalyticTypeResource($this->type),
            'property' => new PropertyResource($this->property),
            'value' => $this->value,
        ];
    }
}
