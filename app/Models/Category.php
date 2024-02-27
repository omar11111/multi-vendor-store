<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'slug', 'status', 'image', 'parent_id'];

    protected static function rules($id = 0)
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('categories', 'name')->ignore($id),
                // function($attribute, $value, $fails){
                //     if(strtolower($value) == 'laravel'){
                //         $fails($value.' is forbidden Value');
                //     }
                // }
                'filter:html,css,laravel'
                // new Filter(['laravel', 'html', 'css'])
            ],
            'parent_id' => [
                'nullable', 'integer', 'exists:categories,id'
            ],
            'image'     => [
                'image', 'max:1048576'
            ],
            'status'    => [
                'in:active,inactive'
            ]
        ];
    }
}
