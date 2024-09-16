<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // if ($this->name === 'Administrator') {
        //     $name = 'Admin';
        // } elseif ($this->name === 'Developer') {
        //     $name = 'Developer';
        // } elseif ($this->name === 'Super Admin') {
        //     $name = 'Super Admin';
        // } elseif ($this->name === 'Customer') {
        //     $name = 'Customer';
        // }

        $result = [
            'id' => $this->id_hash,
            'name' => $this->name,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'users' => UserResource::collection($this->whenLoaded('users'))
        ];

        return $result;
    }
}
