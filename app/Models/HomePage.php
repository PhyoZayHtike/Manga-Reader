<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $fillable = ['image','title','type','summary','author_name','artist_name','genre_name','rating'];
    use HasFactory;
}
