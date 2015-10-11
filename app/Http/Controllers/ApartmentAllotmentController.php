<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use Validator;
use App\Apartment;
use App\ApartmentAllotment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApartmentAllotmentController extends Controller
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
            'amount_needed'           => 'required|numeric',
            'amount_paid'        => 'required|numeric',
            'ir_no'                   => 'required|numeric'
        ];

        $messages = [
            'amount_needed.required'            => 'Should not be empty.',
            'amount_needed.numeric'             => 'Numbers only.',
            'amount_paid.required'         => 'Should not be empty.',
            'amount_paid.numeric'          => 'Numbers only.',
            'ir_no.required'                    => 'Should not be empty.',
            'ir_no.numeric'                     => 'Numbers only.'
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->passes()) {
            $aa = new ApartmentAllotment;
            $aa->apartment_id             = $data['apartment_id'];
            $aa->aa_amount_needed         = $data['amount_needed'];
            $aa->aa_amount_paid           = $data['amount_paid'];
            $aa->ir_no                    = $data['ir_no'];

            $aa->save();

            return Redirect::to('/admin/manageallotment');
            
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
        $aa = ApartmentAllotment::all();
        $apartments = Apartment::all();

        foreach($apartments as $data) {
            $apartment[$data->apartment_id] = $data->apartment_name;
        }

        // array_unshift($apartment, [''=>'Apartment']);

        return view('admin.manageallotment')->with('aas', $aa )->with('apartments', $apartment);
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

        var_dump($data);
        win32_pause_service();

        $aa =  ApartmentAllotment::find($id);

        $aa->apartment_id             = $data['apartment_id'];
        $aa->aa_amount_needed         = $data['amount_needed'];
        $aa->aa_amount_paid           = $data['amount_paid'];
        $aa->ir_no                    = $data['ir_no'];

        $aa->save();

        return Redirect::to('/admin/manageallotment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ApartmentAllotment::destroy($id);

        $data = ApartmentAllotment::all();

        return Redirect::to('/admin/manageallotment')->with("aas", $data);
    }
}
