<?php

namespace App\Models;

use App\Models\Writer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'caption'];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(Writer::class);
    }
}
