<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class LinkRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => is_string($this->slug) ? Str::slug($this->slug) : null,
            'commercial' => $this->commercial ?? false,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => [
                'url',
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:links',
                'not_in:links,stat', // routes
            ],
            'expired_at' => [
                'date',
                'required',
                'after:yesterday'
            ],
            'commercial' => [
                'boolean',
            ],
        ];
    }
}
