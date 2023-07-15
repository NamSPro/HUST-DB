<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'isbn';

    protected $fillable = [
        'title',
        'author_id',
    ];

    public $incrementing = false;

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
