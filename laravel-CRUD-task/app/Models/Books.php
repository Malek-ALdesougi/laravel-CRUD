<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    // add the attributes to this model    // ask to make sure this is the right way
    // protected $appends = ['id', 'book_title', 'book_description', 'book_auther', 'book_image' ];

}