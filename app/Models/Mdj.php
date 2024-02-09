<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mdj extends Model
{
    use HasFactory;

    protected $fillable = [
        'members_id',
        'Life_Retreat',
        'Life_Tract',
        'Life_Retreat_Batch',
        'Water_Baptism',
        'FC_Date_Enrolled',
        'FC_Date_Graduated',
        'MD_Date_Enrolled',
        'MD_Date_Graduated',
        'LGC_Date_Enrolled',
        'LGC_Date_Graduated',
        'Kainos_Date_Enrolled',
        'Kainos_Date_Graduated',
    ];

    public function members()
    {
        return $this->belongsTo(Members::class);
    }

   
}
