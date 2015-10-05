<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Redirect;
use App\Apartment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addapartment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request::all();

        $rules = [
            'name'                  => 'required',
            'num_of_floors'         => 'required|numeric',
            'num_of_rooms'          => 'required|numeric',
            'construction_status'   => 'required',
            'payment_status'        => 'required'
        ];

        $messages = [
            'name.required'                 => 'Should not be empty.',
            'num_of_floors.required'        => 'Should not be empty.',
            'num_of_floors.numeric'         => 'Should not be empty.',
            'num_of_rooms.required'         => 'Should not be empty.',
            'num_of_rooms.numeric'          => 'Numbers only.',
            'construction_status.required'  => 'Should not be empty.',
            'payment_status.required'       => 'Should not be empty.'
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->passes()) {
            $apartment = new Apartment;
            $apartment->apartment_name                  = $data['name'];
            $apartment->apartment_num_of_floors         = $data['num_of_floors'];
            $apartment->apartment_num_of_rooms          = $data['num_of_rooms'];
            $apartment->apartment_construction_status   = $data['construction_status'];
            $apartment->apartment_payment_status        = $data['payment_status'];
            $apartment->save();
            return Redirect::to('/admin/manageapartment');
            
        } else {
            return Redirect::back()->withInput()->withErrors($validation);
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Apartment::all();
        return view('admin.manageapartment')->with('apartments', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $data = Request::all();

        print_r($data);
        $apartment =  Apartment::find($id);

        $apartment->apartment_name                  = $data['name'];
        $apartment->apartment_num_of_floors         = $data['num_of_floors'];
        $apartment->apartment_num_of_rooms          = $data['num_of_rooms'];
        $apartment->apartment_construction_status   = $data['construction_status'];
        $apartment->apartment_payment_status        = $data['payment_status'];

        $apartment->save();

        return Redirect::to('/admin/manageapartment');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apartment::destroy($id);

        $data = Apartment::all();

        return Redirect::to('/admin/manageapartment')->with("apartment", $data);
    }
}
