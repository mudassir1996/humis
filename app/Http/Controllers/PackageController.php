<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\FoodType;
use App\Models\MaktabCategory;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function getPackageDetails($id)
    {
        $package_detail = Package::where('id', $id)->first();
        return response()->json($package_detail);
    }

    public function index()
    {
        $packages = Package::where('package_status', 'ACTIVE')->leftJoin('maktab_categories', 'maktab_categories.id', 'packages.maktab_category_id')->select('packages.*','maktab_categories.maktab_name')->get();
        return view('admin.packages.index', compact('packages'));
    }
   
    public function create()
    {
        $maktab_categories = MaktabCategory::where('maktab_status', 'ACTIVE')->select('id', 'maktab_name')->get();
        $accomodations = Accomodation::where('hotel_status', 'ACTIVE')->select('id', 'hotel_name', 'accomodation_type', 'sharing_room_cost', 'triple_room_cost', 'quad_double_cost')->get();
        $aziziyah_accomodations = $accomodations->where('accomodation_type', 'AZIZIYAH');
        $makkah_accomodations = $accomodations->where('accomodation_type', 'MAKKAH');
        $madinah_accomodations = $accomodations->where('accomodation_type', 'MADINAH');
        $food_types = FoodType::where('food_type_status', 'ACTIVE')->select('id', 'food_type_name', 'food_type_cost')->get();
        return view('admin.packages.create',compact('maktab_categories', 'aziziyah_accomodations', 'makkah_accomodations', 'madinah_accomodations', 'food_types'));
    }
}
