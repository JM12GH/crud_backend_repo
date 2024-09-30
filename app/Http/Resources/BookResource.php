<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $description
 * @property mixed $shelf_number
 * @property mixed $preview_photo
 * @property mixed $total_nr_of_copies
 */
class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'shelf_number' => $this->shelf_number,
            'preview_photo' => $this->preview_photo,
            'total_nr_of_copies' => $this->total_nr_of_copies,
            'book_category' => new BookCategoryResource($this->whenLoaded('bookCategory')),
            'students' => StudentResource::collection($this->whenLoaded('students')),
            'authors' => AuthorResource::collection($this->whenLoaded('authors')),
        ];
    }
}
