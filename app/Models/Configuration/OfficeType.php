<?php

namespace App\Models\Configuration;

use App\Models\Configuration\Office;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfficeType extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['office_type_name'];

    protected static $logAttributes = ['office_type_name'];

    public function office()
    {
        return $this->hasMany(Office::class);
    }
}
