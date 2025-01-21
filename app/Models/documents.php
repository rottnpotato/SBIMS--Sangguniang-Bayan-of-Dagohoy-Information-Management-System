<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;
    protected $table = 'resolutions_ordinances';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamps
    protected $fillable = [
        'title',
        'sponsored',
        'co_sponsored',
        'description',
        'date_published',
        'file_name',
        'type',
        'subject_matter',
        'year_in_series',
        'encryption_key'

    ];
    public $timestamps = true;
}
