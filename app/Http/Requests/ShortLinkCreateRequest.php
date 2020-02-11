<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ShortLinkCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'full' => 'required|url',
        ];
    }
}
