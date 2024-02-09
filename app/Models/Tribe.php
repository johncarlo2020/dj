<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tribe extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_id',
        'name',
    ];

    public function status()
    {
        return $this->hasMany(Status::class,'status_id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function members()
    {
        return $this->hasMany(Members::class);
    }

}
