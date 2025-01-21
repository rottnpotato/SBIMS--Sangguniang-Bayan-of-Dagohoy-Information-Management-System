<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{       
    use HasFactory;
    protected $table = 'schedule';
    protected $fillable = ['title', 'start','committees', 'end', 'description'];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'committees'=> 'array'
    ];
    public $timestamps = true;
}