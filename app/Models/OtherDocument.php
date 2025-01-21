<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class OtherDocument extends Model
{
    use HasFactory;
    protected $table = 'other_documents';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamps
    protected $fillable = [
        'title',
        'description',
        'uploaded_by',
        'file_path'

    ];
    public $timestamps = true;

     // Add relationship to User model
     public function uploader()
     {
         return $this->belongsTo(Account::class, 'uploaded_by');
     }
 
     // Method to get download URL
     public function getDownloadUrl()
     {
         return route('other-documents.download', ['id' => $this->id]);
     }
}
