<?php

namespace App\Models\landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingContact extends Model
{
    use HasFactory;
    protected $table = 'landing_contact';
    protected $guarded = [];
}
