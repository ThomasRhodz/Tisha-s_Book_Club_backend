<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
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
            'id' => $this->CategoryID,
            'type' => 'Categories',
            'attributes' => [
                'CategoryName' => $this->CategoryName,
                'IsActive' => $this->IsActive,
                'create_at' => $this->create_at,
                'updated_at' => $this->updated_at,
            ],
        ];
    }
}
