<?php

namespace App\Http\Resources;

use App\Models\Consultant;
use App\Traits\WhenMorphToLoaded;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    use WhenMorphToLoaded;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id_hash,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_active' => $this->is_active,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'role' => new RoleResource($this->whenLoaded('role')),
        ];

        return $result;
    }
}
