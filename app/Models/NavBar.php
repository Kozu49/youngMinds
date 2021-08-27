<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavBar extends Model
{
    use HasFactory;
    protected $fillable=[
      'navbar','url'
    ];

    protected $table = 'nav_bars';


}
