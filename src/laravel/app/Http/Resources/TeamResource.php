<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'teams',

            'id' => (string) $this->id,

            'match_id' => ['required', 'exists:game_matches,id'],
            'team_id' => ['required', 'exists:teams,id'],

            'attributes' => [
                'name' => $this->name,
                'emblem' => $this->emblem ? asset('storage/' . $this->emblem) : null,
            ],
            'links' => [
                'self' => route('teams.show', ['team' => $this->id]),
            ],
        ];
    }
}
