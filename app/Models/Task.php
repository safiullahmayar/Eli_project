<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
