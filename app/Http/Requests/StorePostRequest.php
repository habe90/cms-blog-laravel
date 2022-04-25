<?php

namespace App\Http\Requests;

use App\Models\Post;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('post_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'is_featured' => [
                'boolean',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'content' => [
                'string',
                'nullable',
            ],
            'category' => [
                'array',
            ],
            'category.*.id' => [
                'integer',
                'exists:categories,id',
            ],
            'comments' => [
                'boolean',
            ],
            'status' => [
                'required',
                'in:' . implode(',', array_keys(Post::STATUS_SELECT)),
            ],
            'slug' => [
                'string',
                'required',
            ],
            'tags' => [
                'string',
                'nullable',
            ],
        ];
    }
}
