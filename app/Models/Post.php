<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Spatie\Tags\HasTags;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function comments()
{
    return $this->hasMany(Comment::class);
}



public static function customValidationRules()
{
    return [
        'title' => [
            'required',
            'unique:posts,title',
            'unique_connection:my_connection,title',
            Rule::unique('posts', 'title')->ignore(1),
        ],
    ];
}

}

