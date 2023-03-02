<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'visible'
    ];

    protected $casts = [
        'visible' => 'boolean'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function getComments(string $search) {
        $comments = $this->where(function($query) use ($search) {
            $query->where('body', 'LIKE', "%{$search}%");
        })->get();

        return $comments;
    }
}
