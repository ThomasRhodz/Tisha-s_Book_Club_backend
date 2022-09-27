<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tbl_bookcategory';

    protected $primaryKey = 'CategoryID';

    protected $fillable = [
        'CategoryName',
        'IsActive',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'CategoryID');
    }
}
