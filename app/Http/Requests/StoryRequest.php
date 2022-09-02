<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $storyId = $this->route('story.id');
        // dd($storyId);
        return [
            'title' => ['required', Rule::unique('stories')->ignore($storyId), 'min:10', 'max:40', 
            function( $attributes, $values, $fail) {
                if( $values == 'Dummy Title') {
                    $fail( ucfirst($attributes) . ' is Invalid');
                }
            }
        ],
            'body' => 'required|min:50',
            'genre' => 'required',
            'status' => 'required'
        ];
    }
}
