<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'category_id'];

    public function category()
    {
        return $this->belongsTo(related: Category::class, foreignKey: 'category_id')->first();
    }
}
