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
            $query->where('bookings.package_type', 'STANDARD')
            ->when(request()->maktab_category_id, function ($query, $maktabCategoryId) {
                $query->where('packages.maktab_category_id', $maktabCategoryId);
            })
                ->when(request()->makkah_accomodation_id, function ($query, $makkahAccomodationId) {
                    $query->where('packages.makkah_accomodation_id', $makkahAccomodationId);
                })
                ->when(request()->madinah_accomodation_id, function ($query, $madinahAccomodationId) {
                    $query->where('packages.madinah_accomodation_id', $madinahAccomodationId);
                })
                ->when(request()->duration_of_stay, function ($query, $durationOfStay) {
                    $query->where('packages.duration_of_stay', $durationOfStay);
                });
        });

        $filter->orWhere(function ($query) {
            // Custom packages filter conditions
            $query->where('bookings.package_type', 'CUSTOM')
            ->when(request()->maktab_category_id, function ($query, $maktabCategoryId) {
                $query->where('custom_packages.maktab_category_id', $maktabCategoryId);
            })
                ->when(request()->makkah_accomodation_id, function ($query, $makkahAccomodationId) {
                    $query->where('custom_packages.makkah_accomodation_id', $makkahAccomodationId);
                })
                ->when(request()->madinah_accomodation_id, function ($query, $madinahAccomodationId) {
                    $query->where('custom_packages.madinah_accomodation_id', $madinahAccomodationId);
                })
                ->when(request()->duration_of_stay, function ($query, $durationOfStay) {
                    $query->where('custom_packages.duration_of_stay', $durationOfStay);
                });
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
