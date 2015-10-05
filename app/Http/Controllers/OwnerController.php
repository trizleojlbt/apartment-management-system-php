<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Redirect;
use App\Owner;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
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
            'id'                => 'required|numeric',
            'lastname'          => 'required|string',
            'firstname'         => 'required|string',
            'middlename'        => 'string',
            'gender'            => 'required|string',
            'birthdate'         => 'required|date',
            'address'           => 'required',
            'nationality'       => 'required|string',
            'telephone'         => 'required',
            'username'          => 'required',
            'password'          => 'required',
            'email'             => 'required|email'
        ];

        $messages = [
            'id.required'           => 'Should not be empty',
            'id.numeric'            => 'Numbers only',
            'lastname.required'     => 'Should not be empty',
            'lastname.string'       => 'Letters only',
            'firstname.required'    => 'Should not be empty',
            'firstname.string'      => 'Letters only',
            'middlename.string'     => 'Letters only',
            'gender.required'       => 'Should not be empty',
            'gender.string'         => 'Letters only',
            'birthdate.required'    => 'Should not be empty',
            'birthdate.date'        => 'Date only',
            'address.required'      => 'Should not be empty',
            'nationality.required'  => 'Should not be empty',
            'nationality.string'    => 'Letters only',
            'telephone.required'    => 'Should not be empty',
            'username.required'     => 'Should not be empty',
            'password.required'     => 'Should not be empty',
            'email.required'        => 'Should not be empty',
            'email.email'           => 'Should be email'
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->passes()) {
            if (Owner::find($data['id'])) {
                return back()->withInput();
            } else {
                $owner = new Owner;
                $owner->owner_id              = $data['id'];
                $owner->owner_lastname        = $data['lastname'];
                $owner->owner_firstname       = $data['firstname'];
                $owner->owner_middlename      = $data['middlename'];
                $owner->owner_gender          = $data['gender'];
                $owner->owner_birthdate       = $data['birthdate'];
                $owner->owner_address         = $data['address'];
                $owner->owner_nationality     = $data['nationality'];
                $owner->owner_telephone       = $data['telephone'];
                $owner->owner_username        = $data['username'];
                $owner->owner_password        = bcrypt($data['password']);
                $owner->owner_email           = $data['email'];

                $owner->save();
                return Redirect::to('/admin/manageowner');
            }
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
        $data = Owner::all();
        return view('admin.manageowner')->with('owners', $data);
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

        print_r($data);
        $owner =  Owner::find($id);

        $owner->owner_lastname        = $data['lastname'];
        $owner->owner_firstname       = $data['firstname'];
        $owner->owner_middlename      = $data['middlename'];
        $owner->owner_gender          = $data['gender'];
        $owner->owner_birthdate       = $data['birthdate'];
        $owner->owner_address         = $data['address'];
        $owner->owner_nationality     = $data['nationality'];
        $owner->owner_telephone       = $data['telephone'];
        $owner->owner_username        = $data['username'];
        $owner->owner_email           = $data['email'];

        $owner->save();

        return Redirect::to('/admin/manageowner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Owner::destroy($id);

        $data = Owner::all();

        return Redirect::to('/admin/manageowner')->with("owners", $data);
    }
}
