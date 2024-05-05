<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::withSum('bookings as total_commission','agent_commission')->where('company_id',auth()->user()->company_id)->get();
        return view('company.agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'agent_name' => 'required',
            'agent_contact' => 'required',

        ]);
        if ($validation->fails()) {
            $notification = array(
                'message' => 'Please fill out required fields!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $agent = new Agent();
        $agent->agent_name = $request->agent_name;
        $agent->agent_contact = $request->agent_contact;
        $agent->company_id = auth()->user()->company_id;
        $agent->created_by = auth()->user()->id;


        if ($agent->save()) {
            $notification = array(
                'message' => 'Agent Added Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('agents.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        return view('company.agents.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'agent_name' => 'required',
            'agent_contact' => 'required',

        ]);
        if ($validation->fails()) {
            $notification = array(
                'message' => 'Please fill out required fields!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $agent = Agent::find($id);
        $agent->agent_name = $request->agent_name;
        $agent->agent_contact = $request->agent_contact;


        if ($agent->save()) {
            $notification = array(
                'message' => 'Agent Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('agents.index')->with($notification);
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
        $agent = Agent::where('id', $id)
            ->firstOrFail();

        if ($agent->delete()) {
            $notification = array(
                'message' => 'Agent Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('agents.index')->with($notification);
    }
}
