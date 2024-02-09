<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'members_id',
        'lesson',

    ];

    public function member()
    {
        return $this->belongsTo(Members::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
