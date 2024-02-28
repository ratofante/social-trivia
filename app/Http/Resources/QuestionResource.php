<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transforms the resource into an array.
     * 
     * @return array <string, mixed>
     */
    public function toArray(Request $request): array
    {
        $resource = [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
            'opt_1' => $this->opt_1,
            'opt_2' => $this->opt_2,
            'opt_3' => $this->opt_3,
            'user_id' => $this->user_id,
            'score' => $this->score,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at
        ];

        // Include user data if loaded
        if ($this->relationLoaded('user')) {
            $resource['user'] = new UserResource($this->user);
        }

        // Include category data if loaded
        if ($this->relationLoaded('category')) {
            $resource['category'] = new CategoryResource($this->category);
        }

        return $resource;
    }
}
