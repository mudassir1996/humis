<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaktabCategory extends Model
{
    use HasFactory;


    public function packages()
    {
        return $this->hasMany(Package::class, 'maktab_category_id');
    }
}
