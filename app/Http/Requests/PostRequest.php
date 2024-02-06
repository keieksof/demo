<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title' => 'required|max:255',             // Title is required and must not exceed 255 characters
            'body' => 'required',                       // Body is required
            'foto' => 'image',      // Photo should be an image file with specific mime types and size
            'thumbnail' => 'image', // Thumbnail should be an image file with specific mime types and size
            'category_id' => 'required',                // Category ID is required
            'tags' => 'nullable|array',                 // Tags is optional but should be an array if present
            'tags.*' => 'exists:tags,id',               // Each tag ID in the array must exist in the 'tags' table
            'scheduled_at' => 'nullable|date_format:Y-m-d\TH:i', // Scheduled date, if provided, should be in the specified format
            'display' => 'nullable|boolean',            // Display should be a boolean if provided
        ];
    }
}
