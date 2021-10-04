<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author_id',
        'is_borrowed'
    ];

    public $timestamps = true;

    public function author(): Relation
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }

    public function getAuthorAttribute()
    {
        return $this->author()->first('fullname');
    }
}
