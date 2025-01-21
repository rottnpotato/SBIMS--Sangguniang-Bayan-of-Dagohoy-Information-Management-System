<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sb_members extends Model
{
    use HasFactory;
    protected $table = 'sb_members';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamps
    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'committee',
        'termStart',
        'termEnd',
        'biography',
        'memberImage',
    ];
    public $timestamps = true;
}
