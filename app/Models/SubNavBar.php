<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubNavBar extends Model
{
    use HasFactory;
    protected $fillable=[
      'navbar_id','sub_navbar'
    ];

    protected $table='sub_nav_bars';
}
