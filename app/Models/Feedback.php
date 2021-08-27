<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['title', 'url', 'description', 'attachment', 'date', 'user_id', 'category'];

    protected static $logAttributes = ['title', 'url', 'description', 'attachment', 'date', 'user_id', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
