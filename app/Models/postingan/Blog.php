<?php

namespace App\Models\postingan;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
