<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FullCalendarMatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->field->name,
            'start' => Carbon::createFromFormat('Y-m-d H:i:s', $this->start_at)->toIso8601String(),
            'end' => Carbon::createFromFormat('Y-m-d H:i:s', $this->end_at)->toIso8601String(),
            'extendedProps' => [
                'status' => $this->status,
                'field_id' => $this->field_id,
                'booking_terms' => $this->field->booking_terms,
            ],
        ];
    }
}
