<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tbl_book';

    protected $primaryKey = 'BookID';

    protected $fillable = [
        'BookTitle',
        'BookISBN',
        'BookAuthor',
        'BookPublicationYear',
        'BookPublisher',
        'BookCopies',
        'IsActive',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }
}
