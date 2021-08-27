<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['country_name', 'short_name', 'status'];
    protected $table = 'countries';
    protected static $logAttributes = ['country_name'];
}
