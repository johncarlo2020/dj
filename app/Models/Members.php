<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
class Members extends Model
{
    use HasFactory;

    protected $fillable = [
        'age_group_id',
        'disciple_id',
        'process_id',
        'status_id',
        'tribe_id',
        'fname',
        'mname',
        'lname',
        'dob',
        'gender',
        'email',
        'marital_status',
        'address',
        'contact_number',
        'FB_account',
        'date_invited',
        'invited_from',
        'grade_level',
        'team_id',
        'company',
        'occupation',
        'campus_name',
        'grade_level/course',
    ];

    protected $appends = ['fullName'];

    public function ageGroup()
    {
        return $this->belongsTo(AgeGroup::class);
    }

    public function disciple()
    {
        return $this->belongsTo(Disciple::class);
    }

    public function status()
    {
        return $this->belongsTo(MemberStatus::class);
    }

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function journey()
    {
        return $this->hasMany(Journey::class);
    }

    public function MembersDiscipleshipJourney()
    {
        return $this->hasMany(Mdj::class);
    }

    public function tribe()
    {
        return $this->belongsTo(Tribe::class);
    }

    public function age(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->dob)->age,
        );
    }

    public function getFullNameAttribute()
    {
        // Concatenate fname and mname with a space in between
        return $this->fname . ' ' . $this->mname. ' ' . $this->lname;
    }


}
