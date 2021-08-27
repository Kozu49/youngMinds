<?php

namespace App\Models\Configuration;

use App\Models\Configuration\District;
use Illuminate\Database\Eloquent\Model;
use App\Models\Configuration\OfficeType;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['office_type_id', 'parent_id', 'district_id', 'office_code', 'office_name', 'office_path', 'office_status'];

    protected static $logAttributes = ['office_code', 'office_name'];

    public function officeType()
    {
        return $this->belongsTo(OfficeType::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
