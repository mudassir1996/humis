<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function maktab()
    {
        return $this->belongsTo(MaktabCategory::class, 'maktab_category_id');
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }
}
