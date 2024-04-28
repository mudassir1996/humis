<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function scopeFilter($filter)
    {
        $filter->where(function ($query) {
            // Standard packages filter conditions
            if(request()->maktab_category_id != '' || request()->makkah_accomodation_id != '' || request()->madinah_accomodation_id != '' || request()->duration_of_stay != ''){
                $query->where('bookings.package_type', 'STANDARD');
            }
            if (request()->maktab_category_id != '') {
                $query->where('packages.maktab_category_id', request()->maktab_category_id);
            }

            if (request()->makkah_accomodation_id != '') {
                $query->where('packages.makkah_accommodation_id', request()->makkah_accomodation_id);
            }

            if (request()->madinah_accomodation_id != '') {
                $query->where('packages.madinah_accommodation_id', request()->madinah_accomodation_id);
            }

            if (request()->duration_of_stay != '') {
                $query->where('packages.duration_of_stay', request()->duration_of_stay);
            }
            if (request()->gender != '') {
                $query->where('applications.gender', request()->gender);
            }
            if (request()->departure_airport_pk_id != '') {
                $query->where('applications.departure_airport_pk_id', request()->departure_airport_pk_id);
            }
            if (request()->ticket != '') {
                $query->where('applications.ticket', request()->ticket);
            }
            if (request()->qurbani != '') {
                $query->where('applications.qurbani', request()->qurbani);
            }

            if (request()->makkah_room_sharing != '') {
                $query->where('applications.makkah_room_sharing', request()->makkah_room_sharing);
            }
            if (request()->madinah_room_sharing != '') {
                $query->where('applications.madinah_room_sharing', request()->madinah_room_sharing);
            }
            
        });

        $filter->orWhere(function ($query) {
            // Custom packages filter conditions
            if (request()->maktab_category_id != '' || request()->makkah_accomodation_id != '' || request()->madinah_accomodation_id != '' || request()->duration_of_stay != '') {
                $query->where('bookings.package_type', 'STANDARD');
            }

            if (request()->maktab_category_id != '') {
                $query->where('custom_packages.maktab_category_id', request()->maktab_category_id);
            }

            if (request()->makkah_accomodation_id != '') {
                $query->where('custom_packages.makkah_accommodation_id', request()->makkah_accomodation_id);
            }

            if (request()->madinah_accomodation_id != '') {
                $query->where('custom_packages.madinah_accommodation_id', request()->madinah_accomodation_id);
            }

            if (request()->duration_of_stay != '') {
                $query->where('custom_packages.duration_of_stay', request()->duration_of_stay);
            }
            if (request()->gender != '') {
                $query->where('applications.gender', request()->gender);
            }
            if (request()->departure_airport_pk_id != '') {
                $query->where('applications.departure_airport_pk_id', request()->departure_airport_pk_id);
            }
            if (request()->ticket != '') {
                $query->where('applications.ticket', request()->ticket);
            }
            if (request()->qurbani != '') {
                $query->where('applications.qurbani', request()->qurbani);
            }
            if (request()->makkah_room_sharing != ''
            ) {
                $query->where('applications.makkah_room_sharing', request()->makkah_room_sharing);
            }
            if (request()->madinah_room_sharing != ''
            ) {
                $query->where('applications.madinah_room_sharing', request()->madinah_room_sharing);
            }
        });

        

        return $filter;
    }

}
