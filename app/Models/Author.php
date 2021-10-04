<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'name',
        'surname',
    ];

    protected $appends = [
        'fullname',
        'books',
    ];

    public $timestamps = true;

    public function getFullnameAttribute()
    {
        return $this->surname . ", " . $this->name;
    }

    public function getBooksAttribute()
    {
        return $this->books()->get(['id', 'title']);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
