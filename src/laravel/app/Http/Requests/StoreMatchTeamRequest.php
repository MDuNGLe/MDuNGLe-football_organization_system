<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatchTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'game_match_id' => 'required|exists:game_matches,id',
            // 'match_id' => 'required|exists:game_matches,id',
            'team_id'       => 'required|exists:teams,id',
            'goal_moments'  => 'nullable'|'string',
            'red_cards'     => 'nullable'|'string',
            'yellow_cards'  => 'nullable'|'string',
        ];
    }
}
