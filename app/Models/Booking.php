<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    /**
     * add filtering.
     *
     * @param  $builder: query builder.
     * @param  $filters: array of filters.
     * @return query builder.
     */
    public function scopeFilter($filter)
    {
        $filter->where(function ($query) {
            // Standard packages filter conditions
            if (request()->maktab_category_id != '' || request()->makkah_accomodation_id != '' || request()->madinah_accomodation_id != '' || request()->duration_of_stay != '') {
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
            if (request()->company_id != '') {
                $query->where('bookings.company_id', request()->company_id);
            }
            if (request()->agent_id != '') {
                $query->where('bookings.agent_name', request()->agent_id);
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
            if (request()->company_id != '') {
                $query->where('bookings.company_id', request()->company_id);
            }
            if (request()->agent_id != '') {
                $query->where('bookings.agent_name', request()->agent_id);
            }
           
        });
        
        return $filter;
    }

    public function scopeFilterReciept($filter)
    {
        if (request()->booking_number != '') {

            $filter->where('bookings.booking_number','like', "%" . request()->booking_number . "%");
        }

        if (request()->contact_name != '') {

            $filter->where('bookings.contact_name', 'like', "%" . request()->contact_name."%");
        }


        return $filter;
    }
}
