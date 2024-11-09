<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Spatie\Tags\HasTags;
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'completed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function customValidationRules()
    {
        return [
            'title' => [
                'required',
                'unique:tasks,title',
                Rule::unique('tasks', 'title')->ignore(1),
            ],
        ];
    }
}




