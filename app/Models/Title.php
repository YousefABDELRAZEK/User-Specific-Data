<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    // Title belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
