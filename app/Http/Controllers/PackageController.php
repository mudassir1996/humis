<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\FoodType;
use App\Models\MaktabCategory;
use App\Models\Package;
use App\Models\SpecialTransport;
use App\Models\Ticket;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function getPackageDetails($id)
    {
        $package_detail = Package::where('id', $id)->first();
        return response()->json($package_detail);
    }


    public function calculatePackagePricing(Request $request)
    {
        $maktab_category_id = $request->maktab_category_id;
        $maktab_category = MaktabCategory::where('id', $maktab_category_id)
            ->where('maktab_status', 'ACTIVE')
            ->first();
            $maktab_cost = $maktab_category->maktab_cost ?? 0;
            $profit = $maktab_category->profit ?? 0;
            $ksa_expense = $maktab_category->ksa_expense ?? 0;
            $pk_expense = $maktab_category->pk_expense ?? 0;
            $transport_cost = $maktab_category->special_transport??0;

        $ticket = Ticket::where('id', $request->ticket_id)
                ->first();

         $ticket_cost = $ticket->ticket_cost??0;

        $accomodations = Accomodation::where('hotel_status', 'ACTIVE')
            ->select('id', 'accomodation_type', 'sharing_room_cost', 'triple_room_cost', 'quad_double_cost')
            ->get();




        $aziziya_accommodation_id = $request->aziziya_accommodation_id;
        $aziziya_accommodation = $accomodations->where('id', $aziziya_accommodation_id)
            ->where('accomodation_type', 'AZIZIYAH')
            ->first();


        $madinah_accommodation_id = $request->madinah_accommodation_id;
        $madinah_accommodation = $accomodations->where('id', $madinah_accommodation_id)
            ->where('accomodation_type', 'MADINAH')
            ->first();

        $makkah_accommodation_id = $request->makkah_accommodation_id;
        $makkah_accommodation = $accomodations->where('id', $makkah_accommodation_id)
            ->where('accomodation_type', 'MAKKAH')
            ->first();


        $aziziya_room_sharing = $request->aziziya_room_sharing;
        if ($aziziya_room_sharing == 'TRIPLE') {
            $aziziya_accommodation_cost = $aziziya_accommodation->triple_room_cost;
        } else if ($aziziya_room_sharing == 'DOUBLE') {
            $aziziya_accommodation_cost = $aziziya_accommodation->quad_double_cost;
        } else {
            $aziziya_accommodation_cost = $aziziya_accommodation->sharing_room_cost ?? 0;
        }

        $madinah_room_sharing = $request->madinah_room_sharing;
        if ($madinah_room_sharing == 'TRIPLE') {
            $madinah_accommodation_cost = $madinah_accommodation->triple_room_cost;
        } else if ($madinah_room_sharing == 'DOUBLE') {
            $madinah_accommodation_cost = $madinah_accommodation->quad_double_cost;
        } else {
            $madinah_accommodation_cost = $madinah_accommodation->sharing_room_cost ?? 0;
        }

        $makkah_room_sharing = $request->makkah_room_sharing;
        if ($makkah_room_sharing == 'TRIPLE') {
            $makkah_accommodation_cost = $makkah_accommodation->triple_room_cost;
        } else if ($makkah_room_sharing == 'DOUBLE') {
            $makkah_accommodation_cost = $makkah_accommodation->quad_double_cost;
        } else {
            $makkah_accommodation_cost = $makkah_accommodation->sharing_room_cost ?? 0;
        }


        $food_type_id = $request->food_type_id;
        $food_type = FoodType::where('id', $food_type_id)
            ->where('food_type_status', 'ACTIVE')
            ->select('food_type_cost')
            ->first();
        $food_cost = $food_type->food_type_cost ?? 0;


        

        $final_package_cost = $maktab_cost + $profit +
            $ksa_expense +
            $pk_expense +
            $aziziya_accommodation_cost +
            $madinah_accommodation_cost +
            $makkah_accommodation_cost +
            $food_cost +
            $ticket_cost +
            $transport_cost;

        // print_r([
        //     $maktab_cost,
        //     $aziziya_accommodation_cost,
        //     $madinah_accommodation_cost,
        //     $makkah_accommodation_cost,
        //     $food_cost,
        //     $transport_cost
        // ]);

        return response()->json(['package_cost' => $final_package_cost]);
    }

    public function index()
    {
        $packages = Package::where('package_status', 'ACTIVE')->leftJoin('maktab_categories', 'maktab_categories.id', 'packages.maktab_category_id')->select('packages.*', 'maktab_categories.maktab_name')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $maktab_categories = MaktabCategory::where('maktab_status', 'ACTIVE')->select('id', 'maktab_name')->get();
        $accomodations = Accomodation::where('hotel_status', 'ACTIVE')->select('id', 'hotel_name', 'accomodation_type', 'sharing_room_cost', 'triple_room_cost', 'quad_double_cost')->get();
        $aziziyah_accomodations = $accomodations->where('accomodation_type', 'AZIZIYAH');
        $makkah_accomodations = $accomodations->where('accomodation_type', 'MAKKAH');
        $madinah_accomodations = $accomodations->where('accomodation_type', 'MADINAH');
        $tickets = Ticket::all();
        $food_types = FoodType::where('food_type_status', 'ACTIVE')->select('id', 'food_type_name', 'food_type_cost')->get();
        return view('admin.packages.create', compact('maktab_categories', 'aziziyah_accomodations', 'makkah_accomodations', 'madinah_accomodations', 'food_types','tickets'));
    }


    public function store(Request $request)
    {

        $package = new Package();
        $package->package_name = $request->package_name;
        $package->maktab_category_id = $request->maktab_category_id;
        $package->duration_of_stay = $request->duration_of_stay;
        $package->nature = $request->nature;
        $package->aziziya_accommodation_id = $request->aziziya_accommodation_id;
        $package->makkah_accommodation_id = $request->makkah_accommodation_id;
        $package->madinah_accommodation_id = $request->madinah_accommodation_id;
        $package->aziziya_room_sharing = "SHARING";
        $package->makkah_room_sharing = $request->makkah_room_sharing ?? "SHARING";
        $package->madinah_room_sharing = $request->madinah_room_sharing ?? "SHARING";
        $package->ticket_id = $request->ticket_id;
        $package->food_type_id = $request->food_type_id;
        $package->special_transport = $request->special_transport;
        $package->cost_per_person = $request->cost_per_person;
        $package->created_by = auth()->user()->id;
        if ($package->save()) {
            $notification = array(
                'message' => 'Package Created Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('packages.index')->with($notification);
    }

    public function edit($id)
    {
        $maktab_categories = MaktabCategory::where('maktab_status', 'ACTIVE')->select('id', 'maktab_name')->get();
        $accomodations = Accomodation::where('hotel_status', 'ACTIVE')->select('id', 'hotel_name', 'accomodation_type', 'sharing_room_cost', 'triple_room_cost', 'quad_double_cost')->get();
        $aziziyah_accomodations = $accomodations->where('accomodation_type', 'AZIZIYAH');
        $makkah_accomodations = $accomodations->where('accomodation_type', 'MAKKAH');
        $madinah_accomodations = $accomodations->where('accomodation_type', 'MADINAH');
        $food_types = FoodType::where('food_type_status', 'ACTIVE')->select('id', 'food_type_name', 'food_type_cost')->get();
        $package = Package::find($id);
        $tickets = Ticket::all();

        return view('admin.packages.edit', compact('maktab_categories', 'aziziyah_accomodations', 'makkah_accomodations', 'madinah_accomodations', 'food_types', 'package', 'tickets'));
    }

    public function update(Request $request, $id)
    {

        $package = Package::find($id);
        $package->package_name = $request->package_name;
        $package->maktab_category_id = $request->maktab_category_id;
        $package->duration_of_stay = $request->duration_of_stay;
        $package->nature = $request->nature;
        $package->aziziya_accommodation_id = $request->aziziya_accommodation_id;
        $package->makkah_accommodation_id = $request->makkah_accommodation_id;
        $package->madinah_accommodation_id = $request->madinah_accommodation_id;
        $package->aziziya_room_sharing = "SHARING";
        $package->makkah_room_sharing = $request->makkah_room_sharing ?? "SHARING";
        $package->madinah_room_sharing = $request->madinah_room_sharing ?? "SHARING";
        $package->ticket_id = $request->ticket_id;
        $package->food_type_id = $request->food_type_id;
        $package->special_transport = $request->special_transport;
        $package->cost_per_person = $request->cost_per_person;
        if ($package->save()) {
            $notification = array(
                'message' => 'Package Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('packages.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //selecting the specific id row for deleting from db
        $package = Package::where('id', $id)
            ->firstOrFail();

        if ($package->delete()) {
            $notification = array(
                'message' => 'Package Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('packages.index')->with($notification);
    }
}
