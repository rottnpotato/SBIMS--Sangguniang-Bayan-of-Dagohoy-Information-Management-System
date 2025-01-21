<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasFactory;
    protected $table = 'news';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamps
    protected $fillable = [
        'title',
        'content',
        'full_content',
        'image'
    ];
    public $timestamps = true;
}
