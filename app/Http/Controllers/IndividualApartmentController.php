<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use Validator;
use App\IndividualApartment;
use App\Apartment;
use App\ApartmentAllotment;
use App\Owner;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndividualApartmentController extends Controller
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
        //
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
            'owner_id'   => 'required|numeric',
            'apartment_id'       => 'required|numeric',
            'aa_id'   => 'required|numeric',
        ];

        $messages = [
            'num_of_occupant.required'  => 'Should not be empty.',
            'num_of_occupant.numeric'   => 'Numbers only.',
            'apartment_id.required'  => 'Should not be empty.',
            'apartment_id.numeric'   => 'Numbers only.',
            'aa_id.required'  => 'Should not be empty.',
            'aa_id.numeric'   => 'Numbers only.'

        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->passes()) {
            $ia = new IndividualApartment;

            $ia->owner_id       = $data['owner_id'];
            $ia->apartment_id   = $data['apartment_id'];
            $ia->aa_id          = $data['aa_id'];

            $ia->save();
            return Redirect::to('/admin/manageindi');
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
        $apartments = Apartment::all();
        $aas = ApartmentAllotment::all(); 
        $owners = Owner::all();
        $ias = IndividualApartment::all();

        foreach($apartments as $data) {
            $apartment[$data->apartment_id] = $data->apartment_name;
        }

        foreach($aas as $data) {
            $aa[$data->aa_id] = $data->aa_id;
        }

        foreach($owners as $data) {
            $owner[$data->owner_id] = $data->owner_firstname.' '.$data->owner_middlename.' '.$data->owner_lastname;
        }

        return view('admin.manageindividualapartment')->with('ias', $ias)->with('owners', $owner)->with('apartments', $apartment)->with('aas', $aa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $ia =  IndividualApartment::find($id);

        $ia->owner_id   = $data['owner_id'];
        $ia->apartment_id  = $data['apartment_id'];
        $ia->aa_id   = $data['aa_id'];

        $ia->save();

        return Redirect::to('/admin/manageindi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IndividualApartment::destroy($id);

        $data = IndividualApartment::all();

        return Redirect::to('admin/manageindi')->with("indiapart", $data);
    }
}
