<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use Validator;
use App\Tenant;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TenantController extends Controller
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
            'homeaddress'       => 'required',
            'telephone'         => 'required',
            'birthdate'         => 'required|date',
            'gender'            => 'required|string',
            'civilstatus'       => 'required|string',
            'nationality'       => 'required|string',
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
            'homeaddress.required'  => 'Should not be empty',
            'telephone.required'    => 'Should not be empty',
            'birthdate.required'    => 'Should not be empty',
            'birthdate.date'        => 'Date only',
            'gender.required'       => 'Should not be empty',
            'gender.string'         => 'Letters only',
            'civilstatus.required'  => 'Should not be empty',
            'civilstatus.string'    => 'Letters only',
            'nationality.required'  => 'Should not be empty',
            'nationality.string'    => 'Letters only',
            'username.required'     => 'Should not be empty',
            'password.required'     => 'Should not be empty',
            'email.required'        => 'Should not be empty',
            'email.email'           => 'Should be email'
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->passes()) {
            if (Tenant::find($data['id'])) {
                return back()->withInput();
            } else {
                $tenant = new Tenant;
                $tenant->tenant_id              = $data['id'];
                $tenant->tenant_lastname        = $data['lastname'];
                $tenant->tenant_firstname       = $data['firstname'];
                $tenant->tenant_middlename      = $data['middlename'];
                $tenant->tenant_homeaddress     = $data['homeaddress'];
                $tenant->tenant_telephone       = $data['telephone'];
                $tenant->tenant_birthdate       = $data['birthdate'];
                $tenant->tenant_gender          = $data['gender'];
                $tenant->tenant_occupation      = $data['occupation'];
                $tenant->tenant_civilstatus     = $data['civilstatus'];
                $tenant->tenant_nationality     = $data['nationality'];
                $tenant->tenant_username        = $data['username'];
                $tenant->tenant_password        = bcrypt($data['password']);
                $tenant->tenant_email           = $data['email'];

                $tenant->save();
                return Redirect::to('/admin/managetenant');
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
        $data = Tenant::all();
        return view('admin.managetenant')->with('tenants', $data);
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
        $tenant =  Tenant::find($id);

        $tenant->tenant_lastname        = $data['lastname'];
        $tenant->tenant_firstname       = $data['firstname'];
        $tenant->tenant_middlename      = $data['middlename'];
        $tenant->tenant_homeaddress     = $data['homeaddress'];
        $tenant->tenant_telephone       = $data['telephone'];
        $tenant->tenant_birthdate       = $data['birthdate'];
        $tenant->tenant_gender          = $data['gender'];
        $tenant->tenant_occupation      = $data['occupation'];
        $tenant->tenant_civilstatus     = $data['civilstatus'];
        $tenant->tenant_nationality     = $data['nationality'];
        $tenant->tenant_username        = $data['username'];
        $tenant->tenant_password        = $data['password'];
        $tenant->tenant_email           = $data['email'];

        $tenant->save();

        return Redirect::to('/admin/managetenant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tenant::destroy($id);

        $data = Tenant::all();

        return Redirect::to('/admin/managetenant')->with("tenants", $data);
    }
}
