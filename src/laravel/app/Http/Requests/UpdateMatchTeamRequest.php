<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMatchTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'match_id' => 'required|exists:game_matches,id',
            'team_id'       => 'required|exists:teams,id',
            'goal_moments'  => 'nullable'|'string',
            'red_cards'     => 'nullable'|'string',
            'yellow_cards'  => 'nullable'|'string',
        ];
    }
}
