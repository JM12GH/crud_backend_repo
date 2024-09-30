<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $email
 * @property mixed $year
 * @property mixed $is_approved
 */
class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'year' => $this->year,
            'email' => $this->email,
            'is_approved' => $this->is_approved,
            'branch' => new BranchResource($this->whenLoaded('branch')),
            'student_category' => new StudentCategoryResource($this->whenLoaded('studentCategory')),
            'books' => BookResource::collection($this->whenLoaded('books')),
        ];
    }
}
