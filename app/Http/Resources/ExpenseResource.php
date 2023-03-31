<?php

namespace App\Http\Resources;

use App\Services\HateoasLinks;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $links = new HateoasLinks;
        $links->get(route('expenses.show', $this->id), 'expenses_details');
        $links->put(route('expenses.update', $this->id), 'expenses_update');
        $links->delete(route('expenses.destroy', $this->id), 'expenses_destroy');
        
        return [
            'id' => $this->id,
            'description' => $this->description,
            'date' => $this->date,
            'value' => $this->value,
            'user' => new UserResource($this->user), 
            'hateoas_links' => $links->toArray()
        ];
    }
}
