<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'category_id',
        'cover',
        'user_id',
    ];

    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }
}
